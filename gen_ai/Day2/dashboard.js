let dashboardData = null;
let currentUser = null;

async function loadDashboardData() {
  const session = requireAuth();
  if (!session) return null;

  currentUser = session;

  try {
    const data = await loadAppData();
    dashboardData = {
      user: {
        name: session.name,
        firstName: session.firstName,
        initials: session.initials,
        role: session.role,
        avatar: session.avatar,
      },
      stats: structuredClone(data.stats),
      salesChart: structuredClone(data.salesChart),
      orders: structuredClone(data.orders),
      performance: structuredClone(data.performance),
      tasks: structuredClone(data.tasks),
      activities: structuredClone(data.activities),
      monthlyGrowth: structuredClone(data.monthlyGrowth),
      liveActivityPool: structuredClone(data.liveActivityPool),
    };
    return dashboardData;
  } catch (error) {
    console.error(error);
    alert("Could not load dashboard data. Please run the project with a local server.");
    return null;
  }
}

function formatStatValue(stat) {
  if (stat.format === "currency") {
    return `$${(stat.value / 1000).toFixed(1)}K`;
  }
  if (stat.format === "compact") {
    return `${(stat.value / 1000).toFixed(1)}K`;
  }
  if (stat.format === "percent") {
    return `${stat.value}%`;
  }
  return stat.value.toLocaleString();
}

function formatCurrency(amount) {
  return `$${amount.toLocaleString()}`;
}

function renderUser() {
  const { user } = dashboardData;

  document.querySelector(".profile-card h4").textContent = user.name;
  document.querySelector(".profile-card p").textContent = user.role;
  document.querySelector(".mini-avatar").textContent = user.initials;
  document.querySelector(".title p").textContent = `Welcome back, ${user.firstName}`;
  document.querySelector(".user-pill strong").textContent = user.firstName;
  document.querySelector(".user-pill .avatar").textContent = user.avatar;
}

function renderStats() {
  const container = document.getElementById("stats-container");

  container.innerHTML = dashboardData.stats
    .map(
      (stat) => `
      <article class="stat-card card">
        <div class="stat-top">
          <div>
            <h3>${stat.title}</h3>
            <div class="value">${formatStatValue(stat)}</div>
          </div>
          <div class="stat-icon">${stat.icon}</div>
        </div>
        <div class="trend ${stat.direction}">
          ${stat.direction === "up" ? "▲" : "▼"} ${stat.trend}%
        </div>
      </article>
    `,
    )
    .join("");
}

function buildChartPath(points, width, height, padding) {
  const chartHeight = height - padding * 2;
  const step = width / (points.length - 1);

  const coords = points.map((value, index) => ({
    x: index * step,
    y: padding + chartHeight - (value / 100) * chartHeight,
  }));

  let path = `M ${coords[0].x} ${coords[0].y}`;

  for (let i = 1; i < coords.length; i++) {
    const prev = coords[i - 1];
    const curr = coords[i];
    const cpX = (prev.x + curr.x) / 2;
    path += ` C ${cpX} ${prev.y}, ${cpX} ${curr.y}, ${curr.x} ${curr.y}`;
  }

  return { path, coords };
}

function renderSalesChart() {
  const { salesChart } = dashboardData;
  const svg = document.getElementById("sales-chart");
  const chip = document.getElementById("chart-period");

  chip.textContent = salesChart.period;

  const width = 700;
  const height = 220;
  const padding = 20;
  const { path, coords } = buildChartPath(salesChart.points, width, height, padding);
  const last = coords[coords.length - 1];
  const peak = coords.reduce((best, point) => (point.y < best.y ? point : best), coords[0]);

  svg.innerHTML = `
    <defs>
      <linearGradient id="lineGradient" x1="0" x2="1">
        <stop offset="0%" stop-color="#6d5efc" />
        <stop offset="100%" stop-color="#31c7c5" />
      </linearGradient>
      <linearGradient id="areaGradient" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0%" stop-color="#6d5efc" stop-opacity="0.18" />
        <stop offset="100%" stop-color="#31c7c5" stop-opacity="0.02" />
      </linearGradient>
    </defs>
    <path
      d="${path} L ${last.x} ${height} L 0 ${height} Z"
      fill="url(#areaGradient)"
    />
    <path
      d="${path}"
      fill="none"
      stroke="url(#lineGradient)"
      stroke-width="5"
      stroke-linecap="round"
    />
    <circle cx="${peak.x}" cy="${peak.y}" r="8" fill="#31c7c5" />
    <circle cx="${last.x}" cy="${last.y}" r="8" fill="#6d5efc" />
  `;
}

function renderOrders(filter = "") {
  const tbody = document.getElementById("orders-body");
  const query = filter.trim().toLowerCase();

  const filtered = dashboardData.orders.filter((order) => {
    if (!query) return true;
    return (
      order.customer.toLowerCase().includes(query) ||
      order.project.toLowerCase().includes(query) ||
      order.status.toLowerCase().includes(query)
    );
  });

  if (filtered.length === 0) {
    tbody.innerHTML = `
      <tr>
        <td colspan="5" style="text-align:center;color:var(--muted);padding:28px;">
          No orders match your search.
        </td>
      </tr>
    `;
    return;
  }

  tbody.innerHTML = filtered
    .map(
      (order) => `
      <tr>
        <td>
          <div class="user-row">
            <div class="tiny-avatar ${order.avatarClass}">${order.initial}</div>
            <span>${order.customer}</span>
          </div>
        </td>
        <td>${order.project}</td>
        <td>${order.date}</td>
        <td><span class="status ${order.status}">${capitalize(order.status)}</span></td>
        <td>${formatCurrency(order.total)}</td>
      </tr>
    `,
    )
    .join("");
}

function renderPerformance() {
  const { performance } = dashboardData;
  const chip = document.getElementById("performance-chip");
  const ring = document.getElementById("performance-ring");

  chip.textContent = `${performance.value}%`;
  ring.style.background = `conic-gradient(var(--primary) 0 ${performance.value}%, #e9ecff ${performance.value}% 100%)`;
  ring.querySelector("span").textContent = `${performance.value}%`;
}

function renderTasks() {
  const list = document.getElementById("task-list");
  const chip = document.getElementById("task-count");
  const pending = dashboardData.tasks.filter((task) => !task.completed);

  chip.textContent = `${pending.length} task${pending.length === 1 ? "" : "s"}`;

  list.innerHTML = dashboardData.tasks
    .map(
      (task) => `
      <li class="task-item${task.completed ? " completed" : ""}" data-task-id="${task.id}">
        <div class="task-main">
          <button class="check${task.completed ? " done" : ""}" type="button" aria-label="Toggle task">
            ${task.completed ? "✓" : ""}
          </button>
          <div>
            <strong>${task.title}</strong>
            <small>${task.time}</small>
          </div>
        </div>
        <span class="badge ${task.badgeClass}">${task.badge}</span>
      </li>
    `,
    )
    .join("");
}

function renderActivities() {
  const list = document.getElementById("activity-list");

  list.innerHTML = dashboardData.activities
    .slice(0, 3)
    .map(
      (activity) => `
      <li class="activity-item">
        <div class="activity-icon">${activity.icon}</div>
        <div>
          <p>${activity.message}</p>
          <small>${activity.time}</small>
        </div>
      </li>
    `,
    )
    .join("");
}

function renderMonthlyGrowth() {
  const { monthlyGrowth } = dashboardData;
  const container = document.getElementById("bars-container");
  const chip = document.getElementById("growth-chip");

  chip.textContent = `+${monthlyGrowth.growth}%`;

  container.innerHTML = monthlyGrowth.months
    .map(
      (month) => `
      <div class="bar-col">
        <div class="bar" style="height: ${month.value}%"></div>
        <span>${month.label}</span>
      </div>
    `,
    )
    .join("");
}

function capitalize(text) {
  return text.charAt(0).toUpperCase() + text.slice(1);
}

function randomMinutesAgo() {
  const minutes = Math.floor(Math.random() * 55) + 1;
  return minutes === 1 ? "1 minute ago" : `${minutes} minutes ago`;
}

function simulateLiveActivity() {
  const pool = dashboardData.liveActivityPool;
  const random = pool[Math.floor(Math.random() * pool.length)];

  dashboardData.activities.unshift({
    icon: random.icon,
    message: random.message,
    time: randomMinutesAgo(),
  });

  dashboardData.activities = dashboardData.activities.slice(0, 5);
  renderActivities();
}

function simulateStatPulse() {
  dashboardData.stats.forEach((stat) => {
    const delta = (Math.random() - 0.5) * 0.4;
    stat.trend = Math.max(0.1, +(stat.trend + delta).toFixed(1));

    if (stat.format === "currency") {
      stat.value += Math.floor((Math.random() - 0.3) * 200);
    } else if (stat.format === "compact") {
      stat.value += Math.floor((Math.random() - 0.3) * 50);
    } else {
      stat.value = +(stat.value + (Math.random() - 0.5) * 0.2).toFixed(1);
    }
  });

  renderStats();
}

function bindNavigation() {
  document.querySelectorAll(".nav-item").forEach((item) => {
    item.addEventListener("click", (event) => {
      event.preventDefault();
      document.querySelectorAll(".nav-item").forEach((nav) => nav.classList.remove("active"));
      item.classList.add("active");
    });
  });
}

function bindSearch() {
  const input = document.getElementById("search-input");
  input.addEventListener("input", (event) => {
    renderOrders(event.target.value);
  });
}

function bindTasks() {
  document.getElementById("task-list").addEventListener("click", (event) => {
    const button = event.target.closest(".check");
    if (!button) return;

    const item = button.closest(".task-item");
    const taskId = Number(item.dataset.taskId);
    const task = dashboardData.tasks.find((entry) => entry.id === taskId);

    if (!task) return;

    task.completed = !task.completed;
    renderTasks();
  });
}

function bindAddReport() {
  document.getElementById("add-report-btn").addEventListener("click", () => {
    const newOrder = {
      id: Date.now(),
      customer: "New Client",
      initial: "N",
      avatarClass: "gold",
      project: "Custom report",
      date: new Date().toLocaleDateString("en-GB", {
        day: "2-digit",
        month: "short",
        year: "numeric",
      }),
      status: "pending",
      total: Math.floor(Math.random() * 4000) + 1200,
    };

    dashboardData.orders.unshift(newOrder);
    renderOrders(document.getElementById("search-input").value);

    dashboardData.activities.unshift({
      icon: "☰",
      message: "New report added",
      time: "Just now",
    });
    renderActivities();
  });
}

function bindLogout() {
  document.getElementById("logout-btn").addEventListener("click", logout);
}

async function initDashboard() {
  const loaded = await loadDashboardData();
  if (!loaded) return;

  renderUser();
  renderStats();
  renderSalesChart();
  renderOrders();
  renderPerformance();
  renderTasks();
  renderActivities();
  renderMonthlyGrowth();

  bindNavigation();
  bindSearch();
  bindTasks();
  bindAddReport();
  bindLogout();

  setInterval(simulateLiveActivity, 15000);
  setInterval(simulateStatPulse, 20000);
}

document.addEventListener("DOMContentLoaded", initDashboard);
