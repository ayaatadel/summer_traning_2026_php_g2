<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | {{ config('app.name') }}</title>
    <x-bootstrap-Css></x-bootstrap-Css>
    <style>
        :root {
            --ink: #17231f;
            --muted: #6d7974;
            --paper: #f5f4ef;
            --line: #dfe3dc;
            --mint: #c9e8d5;
            --coral: #e68167;
            --navy: #253c52;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            font-family: Georgia, 'Times New Roman', serif;
        }

        .dashboard-shell {
            max-width: 1380px;
            margin: 0 auto;
            padding: 46px 28px 70px;
        }

        .dashboard-hero {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 34px;
        }

        .eyebrow {
            color: var(--coral);
            font: 700 12px/1.2 Arial, sans-serif;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        h1 {
            font-size: clamp(2.2rem, 5vw, 4.8rem);
            line-height: .95;
            margin: 10px 0 14px;
            letter-spacing: -.03em;
        }

        .hero-copy {
            color: var(--muted);
            font: 15px/1.6 Arial, sans-serif;
            max-width: 520px;
            margin: 0;
        }

        .date-chip {
            background: var(--navy);
            color: #fff;
            padding: 13px 17px;
            font: 700 12px Arial, sans-serif;
            letter-spacing: .05em;
            white-space: nowrap;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 34px;
        }

        .stat-card {
            border: 1px solid var(--line);
            background: #fff;
            padding: 22px;
            min-height: 136px;
            position: relative;
            overflow: hidden;
        }

        .stat-card:nth-child(2) {
            background: var(--mint);
        }

        .stat-card:nth-child(3) {
            background: #f8d9bf;
        }

        .stat-card:nth-child(4) {
            background: #d8e1ec;
        }

        .stat-label {
            font: 700 11px Arial, sans-serif;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .stat-value {
            display: block;
            font-size: 38px;
            margin-top: 20px;
        }

        .stat-note {
            font: 12px Arial, sans-serif;
            color: var(--muted);
            margin-top: 6px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.25fr) minmax(300px, .75fr);
            gap: 18px;
        }

        .panel {
            background: #fff;
            border: 1px solid var(--line);
            padding: 25px;
            margin-bottom: 18px;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 15px;
            margin-bottom: 20px;
        }

        .panel h2 {
            font-size: 24px;
            margin: 0;
        }

        .panel-link {
            color: var(--coral);
            font: 700 12px Arial, sans-serif;
            text-decoration: none;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font: 14px Arial, sans-serif;
        }

        .data-table th {
            color: var(--muted);
            font-size: 10px;
            letter-spacing: .1em;
            text-align: left;
            text-transform: uppercase;
            padding: 0 8px 12px;
        }

        .data-table td {
            border-top: 1px solid var(--line);
            padding: 14px 8px;
            vertical-align: middle;
        }

        .data-table th:first-child,
        .data-table td:first-child {
            padding-left: 0;
        }

        .person {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            background: var(--navy);
            color: #fff;
            font: 700 12px Arial, sans-serif;
        }

        .subtle {
            color: var(--muted);
            font-size: 12px;
        }

        .status {
            display: inline-block;
            padding: 5px 8px;
            background: #e7f3e9;
            color: #397047;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .status.warn {
            background: #fce7dc;
            color: #a34f39;
        }

        .progress-row {
            margin-bottom: 18px;
            font: 14px Arial, sans-serif;
        }

        .progress-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .progress-track {
            height: 8px;
            background: #edf0eb;
        }

        .progress-bar {
            height: 100%;
            background: var(--coral);
        }

        .empty {
            color: var(--muted);
            font: 14px Arial, sans-serif;
            padding: 15px 0;
        }

        @media (max-width: 900px) {
            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .dashboard-shell {
                padding: 30px 16px 50px;
            }

            .dashboard-hero {
                display: block;
            }

            .date-chip {
                display: inline-block;
                margin-top: 20px;
            }

            .stat-grid {
                gap: 9px;
            }

            .stat-card {
                padding: 16px;
                min-height: 115px;
            }

            .stat-value {
                font-size: 30px;
                margin-top: 17px;
            }

            .panel {
                padding: 18px 14px;
                overflow-x: auto;
            }

            .data-table {
                min-width: 520px;
            }
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <main class="dashboard-shell">
        <header class="dashboard-hero">
            <div><span class="eyebrow">Operations / Overview</span>
                <h1>Good morning,<br>Admin.</h1>
                <p class="hero-copy">A clear view of your store, from today's orders to the products that need your
                    attention.</p>
            </div>
            <div class="date-chip">{{ now()->format('D, d M Y') }}</div>
        </header>

        <section class="stat-grid" aria-label="Store summary">
            <article class="stat-card"><span class="stat-label">Total users</span><strong class="stat-value">{{
                    number_format($userCount) }}</strong><span class="stat-note">Registered accounts</span></article>
            <article class="stat-card"><span class="stat-label">Products</span><strong class="stat-value">{{
                    number_format($productCount) }}</strong><span class="stat-note">Across {{
                    number_format($categoryCount) }} categories</span></article>
            <article class="stat-card"><span class="stat-label">Orders</span><strong class="stat-value">{{
                    number_format($orderCount) }}</strong><span class="stat-note">All time orders</span></article>
            <article class="stat-card"><span class="stat-label">Inventory value</span><strong class="stat-value">${{
                    number_format((float) $inventoryValue, 2) }}</strong><span class="stat-note">Current stock at listed
                    price</span></article>
        </section>

        <div class="content-grid">
            <div>
                <section class="panel">
                    <div class="panel-heading">
                        <h2>Recent orders</h2><a class="panel-link" href="{{ route('users.index') }}">View users
                            &rarr;</a>
                    </div>
                    @if($recentOrders->isNotEmpty())<table class="data-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Order</th>
                                <th>Date</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($recentOrders as $order)<tr>
                                <td>
                                    <div class="person"><span class="avatar">{{ strtoupper(substr($order->user?->name ??
                                            'G', 0, 1)) }}</span><span>{{ $order->user?->name ?? 'Guest' }}<br><span
                                                class="subtle">{{ $order->user?->email ?? 'No email' }}</span></span>
                                    </div>
                                </td>
                                <td>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="subtle">{{ $order->created_at?->format('d M Y') }}</td>
                                <td><span class="status">Recorded</span></td>
                            </tr>@endforeach</tbody>
                    </table>@else<div class="empty">No orders have been recorded yet.</div>@endif
                </section>
                <section class="panel">
                    <div class="panel-heading">
                        <h2>Latest payments</h2><span class="subtle">{{ $recentPayments->count() }} shown</span>
                    </div>
                    @if($recentPayments->isNotEmpty())<table class="data-table">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Received</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($recentPayments as $payment)<tr>
                                <td>#PAY-{{ str_pad($payment->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="subtle">{{ $payment->created_at?->format('d M Y, H:i') }}</td>
                                <td><span class="status">Processed</span></td>
                            </tr>@endforeach</tbody>
                    </table>@else<div class="empty">No payments have been recorded yet.</div>@endif
                </section>
            </div>
            <aside>
                <section class="panel">
                    <div class="panel-heading">
                        <h2>Stock watch</h2><span class="subtle">5 units or less</span>
                    </div>@forelse($lowStockProducts as $product)<div class="progress-row">
                        <div class="progress-meta"><span>{{ $product->name }}</span><strong>{{ $product->quantity
                                }}</strong></div>
                        <div class="progress-track">
                            <div class="progress-bar" style="width: {{ min(100, max(8, $product->quantity * 20)) }}%">
                            </div>
                        </div>
                    </div>@empty<div class="empty">Everything is comfortably stocked.</div>@endforelse
                </section>
                <section class="panel">
                    <div class="panel-heading">
                        <h2>Category mix</h2><span class="subtle">Products</span>
                    </div>@php($maxCategoryProducts = max(1, (int)
                    $categoryStats->max('products_count')))<span></span>@forelse($categoryStats as $category)<div
                        class="progress-row">
                        <div class="progress-meta"><span>{{ $category->name }}</span><strong>{{
                                $category->products_count }}</strong></div>
                        <div class="progress-track">
                            <div class="progress-bar"
                                style="width: {{ ($category->products_count / $maxCategoryProducts) * 100 }}%"></div>
                        </div>
                    </div>@empty<div class="empty">No categories have been created yet.</div>@endforelse
                </section>
            </aside>
        </div>
    </main>
    <x-bootstrap-js></x-bootstrap-js>
</body>

</html>
