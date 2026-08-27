const AUTH_KEYS = {
  session: "flowboard_session",
  registered: "flowboard_registered_users",
};

let cachedData = null;

async function loadAppData() {
  if (cachedData) return cachedData;

  const response = await fetch("data.json");
  if (!response.ok) {
    throw new Error("Failed to load data.json");
  }

  cachedData = await response.json();
  return cachedData;
}

function getRegisteredUsers() {
  try {
    return JSON.parse(localStorage.getItem(AUTH_KEYS.registered)) || [];
  } catch {
    return [];
  }
}

function saveRegisteredUsers(users) {
  localStorage.setItem(AUTH_KEYS.registered, JSON.stringify(users));
}

function getSession() {
  try {
    return JSON.parse(localStorage.getItem(AUTH_KEYS.session));
  } catch {
    return null;
  }
}

function setSession(user) {
  const { password, ...safeUser } = user;
  localStorage.setItem(AUTH_KEYS.session, JSON.stringify(safeUser));
}

function clearSession() {
  localStorage.removeItem(AUTH_KEYS.session);
}

function requireAuth() {
  const session = getSession();
  if (!session) {
    window.location.href = "login.html";
    return null;
  }
  return session;
}

function redirectIfAuthenticated() {
  if (getSession()) {
    window.location.href = "index.html";
  }
}

async function getAllUsers() {
  const data = await loadAppData();
  return [...data.users, ...getRegisteredUsers()];
}

async function login(email, password) {
  const users = await getAllUsers();
  const user = users.find(
    (entry) => entry.email.toLowerCase() === email.toLowerCase() && entry.password === password,
  );

  if (!user) {
    return { success: false, message: "Invalid email or password." };
  }

  setSession(user);
  return { success: true };
}

async function register(formData) {
  const { name, email, password, confirmPassword, role } = formData;

  if (!name || !email || !password || !confirmPassword) {
    return { success: false, message: "Please fill in all required fields." };
  }

  if (password.length < 6) {
    return { success: false, message: "Password must be at least 6 characters." };
  }

  if (password !== confirmPassword) {
    return { success: false, message: "Passwords do not match." };
  }

  const users = await getAllUsers();
  const exists = users.some((entry) => entry.email.toLowerCase() === email.toLowerCase());

  if (exists) {
    return { success: false, message: "An account with this email already exists." };
  }

  const firstName = name.trim().split(" ")[0];
  const initials = name
    .trim()
    .split(" ")
    .map((part) => part[0])
    .join("")
    .slice(0, 2)
    .toUpperCase();

  const newUser = {
    email: email.trim().toLowerCase(),
    password,
    name: name.trim(),
    firstName,
    initials,
    role: role || "Team member",
    avatar: firstName.charAt(0).toUpperCase(),
  };

  const registered = getRegisteredUsers();
  registered.push(newUser);
  saveRegisteredUsers(registered);
  setSession(newUser);

  return { success: true };
}

function logout() {
  clearSession();
  window.location.href = "login.html";
}

function showFormMessage(element, message, type = "error") {
  element.textContent = message;
  element.className = `form-message ${type}`;
  element.hidden = !message;
}
