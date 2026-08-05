<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coffee Manager Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/adminpartial.css') }}">

     <body>
  <div class="app-shell">
    <!-- Sidebar include -->
@include('admin_partials.sidebar')
    <!-- Main Panel -->
    <div class="main-panel">
      <!-- Header include -->
      @include('admin_partials.header')

      <!-- Main content include -->
      @include('admin_partials.main')

      <!-- Extra Features: Categories + Menu + Billing -->
      <main class="content">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root{
    --bg:#f0ece8;
    --panel:#f7f3f0;
    --surface:#ffffff;
    --surface-2:#ede8e3;
    --surface-3:#e5ddd6;
    --border:#e2d9d0;
    --text:#2c1a0e;
    --text-1:#1a0e07;
    --text-2:#7a5a45;
    --text-3:#b0907a;
    --accent:#c8703a;
    --accent-2:#e0a070;
    --accent-deep:#a85a28;
    --danger:#e05a2b;
    --danger-soft:#fbe6dd;
    --warning:#d99a2b;
    --warning-soft:#faf0d8;
    --success:#5a8a3a;
    --success-soft:#e8f0dd;
    --info:#7a9ab0;
    --info-soft:#e4ecf2;
    --shadow:0 10px 30px rgba(44,26,14,0.08);
    --shadow-sm:0 4px 14px rgba(44,26,14,0.06);
    --radius:18px;
    --radius-sm:12px;
  }

  body{
    font-family:'Plus Jakarta Sans','Segoe UI',system-ui,-apple-system,sans-serif;
    background:var(--bg);
    color:var(--text);
    line-height:1.5;
    -webkit-font-smoothing:antialiased;
  }

  /* ===== Main content area (drop inside your .content) ===== */
  .dashboard{
    display:grid;
    gap:18px;
  }

  /* ===== Page head ===== */
  .page-head{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:20px;
    flex-wrap:wrap;
  }
  .page-head h1{
    font-size:24px;
    font-weight:800;
    color:var(--text-1);
    letter-spacing:-.02em;
  }
  .page-head p{
    color:var(--text-2);
    font-size:13.5px;
    margin-top:4px;
  }
  .head-actions{display:flex;gap:10px;align-items:center}
  .btn{
    display:inline-flex;align-items:center;gap:8px;
    padding:10px 18px;
    border-radius:24px;
    border:1px solid var(--border);
    background:var(--surface-2);
    color:var(--text);
    font-family:inherit;
    font-size:13.5px;
    font-weight:600;
    cursor:pointer;
    transition:.2s ease;
  }
  .btn:hover{background:var(--surface-3);transform:translateY(-1px)}
  .btn-primary{
    background:var(--accent);color:#fff;border-color:var(--accent);
    box-shadow:0 6px 18px rgba(200,112,58,.32);
  }
  .btn-primary:hover{background:var(--accent-deep);border-color:var(--accent-deep)}
  .btn svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}

  /* ===== Metric cards ===== */
  .metrics{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:16px;
  }
  .metric{
    background:var(--surface);
    border-radius:var(--radius);
    padding:20px;
    box-shadow:var(--shadow);
    position:relative;
    overflow:hidden;
    transition:.22s ease;
  }
  .metric:hover{transform:translateY(-3px);box-shadow:0 16px 36px rgba(44,26,14,.12)}
  .metric::after{
    content:"";position:absolute;right:-26px;top:-26px;
    width:110px;height:110px;border-radius:50%;
    background:var(--icon-bg);opacity:.6;
  }
  .metric .icon{
    width:44px;height:44px;border-radius:13px;
    display:grid;place-items:center;
    position:relative;z-index:1;
    margin-bottom:14px;
  }
  .metric .icon svg{width:22px;height:22px;stroke-width:1.9;fill:none;stroke-linecap:round;stroke-linejoin:round}
  .metric .label{font-size:13px;color:var(--text-2);font-weight:500;position:relative;z-index:1}
  .metric .value{font-size:27px;font-weight:800;letter-spacing:-.02em;color:var(--text-1);margin-top:4px;position:relative;z-index:1}
  .metric .trend{
    display:flex;align-items:center;gap:6px;
    font-size:12.5px;font-weight:600;margin-top:10px;
    position:relative;z-index:1;
  }
  .trend.up{color:var(--success)}
  .trend.down{color:var(--danger)}
  .trend .chip{
    display:inline-flex;align-items:center;gap:3px;
    padding:2px 8px;border-radius:7px;font-size:11px;font-weight:700;
  }
  .trend.up .chip{background:var(--success-soft)}
  .trend.down .chip{background:var(--danger-soft)}

  .m-sales .icon{background:var(--danger-soft);color:var(--danger)}
  .m-sales{--icon-bg:var(--danger-soft)}
  .m-orders .icon{background:#f0e0d0;color:var(--accent)}
  .m-orders{--icon-bg:#f0e0d0}
  .m-revenue .icon{background:var(--success-soft);color:var(--success)}
  .m-revenue{--icon-bg:var(--success-soft)}
  .m-customers .icon{background:var(--warning-soft);color:var(--warning)}
  .m-customers{--icon-bg:var(--warning-soft)}

  /* ===== Grid layouts ===== */
  .grid-2{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:18px;
  }
  .grid-2-eq{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
  }

  .card{
    background:var(--surface);
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    overflow:hidden;
  }
  .card-head{
    display:flex;align-items:center;justify-content:space-between;
    padding:18px 22px;
    border-bottom:1px solid var(--border);
  }
  .card-head h3{font-size:15.5px;font-weight:700;color:var(--text-1);letter-spacing:-.01em}
  .card-head .sub{font-size:12.5px;color:var(--text-3);margin-top:2px}
  .link-btn{
    background:none;border:none;color:var(--accent);
    font-family:inherit;font-size:13px;font-weight:600;cursor:pointer;
  }
  .link-btn:hover{text-decoration:underline}
  .card-body{padding:20px 22px}

  /* ===== Sales chart ===== */
  .chart-stats{display:flex;gap:28px;margin-bottom:8px}
  .chart-stats .s-val{font-size:23px;font-weight:800;letter-spacing:-.02em;color:var(--text-1)}
  .chart-stats .s-label{font-size:12.5px;color:var(--text-3)}
  .chart-wrap{display:flex;align-items:flex-end;gap:14px;height:210px;padding-top:14px}
  .bar-col{flex:1;display:flex;flex-direction:column;align-items:center;gap:8px;height:100%;justify-content:flex-end}
  .bar{
    width:100%;max-width:36px;border-radius:9px 9px 5px 5px;
    background:linear-gradient(180deg,var(--accent-2) 0%,var(--accent) 100%);
    transition:height .6s cubic-bezier(.2,.8,.2,1);
    position:relative;cursor:pointer;
  }
  .bar:hover{filter:brightness(1.06)}
  .bar .tip{
    position:absolute;bottom:calc(100% + 6px);left:50%;transform:translateX(-50%);
    background:var(--text);color:#fff;font-size:11px;font-weight:600;
    padding:4px 9px;border-radius:7px;white-space:nowrap;
    opacity:0;pointer-events:none;transition:.15s;
  }
  .bar:hover .tip{opacity:1}
  .bar-label{font-size:12px;color:var(--text-3);font-weight:500}
  .chart-legend{
    display:flex;gap:18px;margin-top:16px;padding-top:16px;
    border-top:1px solid var(--border);font-size:12.5px;color:var(--text-2);
  }
  .legend-dot{width:10px;height:10px;border-radius:3px;display:inline-block;margin-right:6px;vertical-align:middle}

  /* ===== Quick actions ===== */
  .quick-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  .quick-action{
    display:flex;align-items:center;gap:12px;
    padding:15px;border-radius:var(--radius-sm);
    background:var(--surface-2);border:1px solid transparent;
    cursor:pointer;transition:.2s;
  }
  .quick-action:hover{
    border-color:var(--accent);
    background:#fbf3ec;
    transform:translateY(-2px);
    box-shadow:var(--shadow-sm);
  }
  .qa-icon{
    width:40px;height:40px;border-radius:11px;flex-shrink:0;
    display:grid;place-items:center;
    background:var(--surface);border:1px solid var(--border);color:var(--accent);
    transition:.2s;
  }
  .qa-icon svg{width:19px;height:19px;stroke:currentColor;fill:none;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
  .quick-action:hover .qa-icon{background:var(--accent);color:#fff;border-color:var(--accent)}
  .qa-label{font-size:13.5px;font-weight:600;color:var(--text-1)}
  .qa-sub{font-size:11.5px;color:var(--text-3);margin-top:1px}

  /* ===== Recent orders table ===== */
  .orders-table{width:100%;border-collapse:collapse}
  .orders-table th{
    text-align:left;font-size:11.5px;font-weight:600;
    color:var(--text-3);text-transform:uppercase;letter-spacing:.05em;
    padding:10px 18px;border-bottom:1px solid var(--border);
  }
  .orders-table td{
    padding:14px 18px;border-bottom:1px solid var(--border);
    font-size:13.5px;color:var(--text);
  }
  .orders-table tr:last-child td{border-bottom:none}
  .orders-table tr:hover td{background:var(--panel)}
  .cust{display:flex;align-items:center;gap:10px}
  .avatar{
    width:36px;height:36px;border-radius:50%;
    display:grid;place-items:center;
    color:#fff;font-size:12.5px;font-weight:700;flex-shrink:0;
  }
  .a1{background:#c8703a}.a2{background:#7a9ab0}.a3{background:#5a8a3a}
  .a4{background:#d99a2b}.a5{background:#a85a28}.a6{background:#e05a2b}
  .cust .name{font-weight:600;font-size:13.5px;color:var(--text-1)}
  .cust .email{font-size:11.5px;color:var(--text-3)}
  .badge{
    display:inline-flex;align-items:center;gap:5px;
    padding:4px 11px;border-radius:20px;font-size:11.5px;font-weight:600;
  }
  .badge .b-dot{width:6px;height:6px;border-radius:50%;background:currentColor}
  .b-paid{background:var(--success-soft);color:var(--success)}
  .b-pending{background:var(--warning-soft);color:var(--warning)}
  .b-shipped{background:var(--info-soft);color:var(--info)}
  .b-refund{background:var(--danger-soft);color:var(--danger)}

  /* ===== Top products ===== */
  .product-item{display:flex;align-items:center;gap:12px;padding:13px 0;border-bottom:1px solid var(--border)}
  .product-item:last-child{border-bottom:none}
  .p-thumb{
    width:44px;height:44px;border-radius:11px;
    background:var(--surface-2);display:grid;place-items:center;
    font-size:20px;flex-shrink:0;border:1px solid var(--border);
  }
  .p-info{flex:1;min-width:0}
  .p-name{font-size:13.5px;font-weight:600;color:var(--text-1);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .p-meta{font-size:11.5px;color:var(--text-3);margin-top:2px}
  .p-sales{text-align:right}
  .p-amount{font-size:13.5px;font-weight:700;color:var(--text-1)}
  .p-count{font-size:11.5px;color:var(--text-3)}
  .progress{height:5px;background:var(--surface-2);border-radius:4px;margin-top:7px;overflow:hidden}
  .progress > span{display:block;height:100%;border-radius:4px;background:linear-gradient(90deg,var(--accent-2),var(--accent))}

  /* ===== Low stock alerts ===== */
  .alert-item{
    display:flex;align-items:center;gap:12px;
    padding:13px 15px;border-radius:var(--radius-sm);
    background:var(--surface-2);margin-bottom:10px;
    border:1px solid var(--border);
    transition:.18s;
  }
  .alert-item:last-child{margin-bottom:0}
  .alert-item:hover{box-shadow:var(--shadow-sm);transform:translateY(-1px)}
  .alert-icon{
    width:40px;height:40px;border-radius:11px;flex-shrink:0;
    display:grid;place-items:center;font-size:18px;
  }
  .al-warn{background:var(--warning-soft);color:var(--warning)}
  .al-err{background:var(--danger-soft);color:var(--danger)}
  .alert-body{flex:1;min-width:0}
  .alert-title{font-size:13.5px;font-weight:600;color:var(--text-1)}
  .alert-sub{font-size:11.5px;color:var(--text-3);margin-top:2px}
  .stock-pill{
    font-size:11px;font-weight:700;padding:4px 10px;border-radius:8px;
  }
  .stock-low{background:var(--warning-soft);color:var(--warning)}
  .stock-out{background:var(--danger-soft);color:var(--danger)}

  /* ===== Notifications ===== */
  .notif{display:flex;gap:12px;padding:13px 0;border-bottom:1px solid var(--border)}
  .notif:last-child{border-bottom:none}
  .notif .n-icon{
    width:38px;height:38px;border-radius:11px;flex-shrink:0;
    display:grid;place-items:center;font-size:16px;
  }
  .n-info{background:var(--info-soft);color:var(--info)}
  .n-ok{background:var(--success-soft);color:var(--success)}
  .n-warn{background:var(--warning-soft);color:var(--warning)}
  .n-acc{background:#f0e0d0;color:var(--accent)}
  .notif-text{font-size:13px;line-height:1.45;color:var(--text)}
  .notif-text b{font-weight:700;color:var(--text-1)}
  .notif-time{font-size:11px;color:var(--text-3);margin-top:3px}

  /* ===== Responsive ===== */
  @media (max-width:1024px){
    .metrics{grid-template-columns:repeat(2,1fr)}
    .grid-2,.grid-2-eq{grid-template-columns:1fr}
  }
  @media (max-width:640px){
    .metrics{grid-template-columns:1fr}
    .page-head h1{font-size:21px}
    .orders-table th:nth-child(3),.orders-table td:nth-child(3){display:none}
  }
</style>
</head>
<body>

<!-- ===== Drop this inside your .content main area ===== -->
<div class="dashboard">

  <!-- Page header -->
  <div class="page-head">
    <div>
      <h1>Dashboard</h1>
      <p>Welcome back, {{ $user->name ?? 'Admin' }}, here's what's brewing today.</p>
    </div>
    <div class="head-actions">
      <button class="btn">
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        {{ now()->format('M d, Y') }}
      </button>
      <button class="btn btn-primary">
        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Add Product
      </button>
    </div>
  </div>

  <!-- Metric cards -->
  <div class="metrics">
    @foreach ($metrics as $metric)
      <div class="metric {{ $metric['class'] }}">
        <div class="icon">
          <svg viewBox="0 0 24 24"><path d="M12 1v22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <div class="label">{{ $metric['label'] }}</div>
        <div class="value">{{ $metric['value'] }}</div>
        <div class="trend {{ $metric['trendClass'] }}"><span class="chip">{{ $metric['trend'] }}</span> {{ $metric['detail'] }}</div>
      </div>
    @endforeach
  </div>

  <!-- Sales analytics + Quick actions -->
  <div class="grid-2">
    <div class="card">
      <div class="card-head">
        <div>
          <h3>Sales Analytics</h3>
          <div class="sub">Revenue overview for this week</div>
        </div>
        <button class="link-btn">View Reports →</button>
      </div>
      <div class="card-body">
        <div class="chart-stats">
          <div>
            <div class="s-val">$84,200</div>
            <div class="s-label">Total this week</div>
          </div>
          <div>
            <div class="s-val" style="color:var(--success)">+18.2%</div>
            <div class="s-label">Growth rate</div>
          </div>
          <div>
            <div class="s-val">324</div>
            <div class="s-label">Avg daily orders</div>
          </div>
        </div>
        <div class="chart-wrap">
          <div class="bar-col"><div class="bar" style="height:45%"><span class="tip">$7,200</span></div><div class="bar-label">Mon</div></div>
          <div class="bar-col"><div class="bar" style="height:62%"><span class="tip">$9,800</span></div><div class="bar-label">Tue</div></div>
          <div class="bar-col"><div class="bar" style="height:50%"><span class="tip">$8,100</span></div><div class="bar-label">Wed</div></div>
          <div class="bar-col"><div class="bar" style="height:78%"><span class="tip">$12,400</span></div><div class="bar-label">Thu</div></div>
          <div class="bar-col"><div class="bar" style="height:88%"><span class="tip">$14,200</span></div><div class="bar-label">Fri</div></div>
          <div class="bar-col"><div class="bar" style="height:95%"><span class="tip">$15,300</span></div><div class="bar-label">Sat</div></div>
          <div class="bar-col"><div class="bar" style="height:70%"><span class="tip">$11,200</span></div><div class="bar-label">Sun</div></div>
        </div>
        <div class="chart-legend">
          <div><span class="legend-dot" style="background:var(--accent)"></span>Daily Revenue</div>
          <div><span class="legend-dot" style="background:var(--accent-2)"></span>Target Goal</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-head">
        <h3>Quick Actions</h3>
      </div>
      <div class="card-body">
        <div class="quick-grid">
          <div class="quick-action">
            <div class="qa-icon"><svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
            <div><div class="qa-label">Add Product</div><div class="qa-sub">New item</div></div>
          </div>
          <div class="quick-action">
            <div class="qa-icon"><svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
            <div><div class="qa-label">Manage Orders</div><div class="qa-sub">12 pending</div></div>
          </div>
          <div class="quick-action">
            <div class="qa-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <div><div class="qa-label">View Reports</div><div class="qa-sub">Analytics</div></div>
          </div>
          <div class="quick-action">
            <div class="qa-icon"><svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
            <div><div class="qa-label">Add Coupon</div><div class="qa-sub">Promotions</div></div>
          </div>
          <div class="quick-action">
            <div class="qa-icon"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <div><div class="qa-label">Add Customer</div><div class="qa-sub">New account</div></div>
          </div>
          <div class="quick-action">
            <div class="qa-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
            <div><div class="qa-label">Settings</div><div class="qa-sub">Configure</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent orders + Top products -->
  <div class="grid-2">
    <div class="card">
      <div class="card-head">
        <div>
          <h3>Recent Orders</h3>
          <div class="sub">Latest transactions from your store</div>
        </div>
        <button class="link-btn">View All →</button>
      </div>
      <table class="orders-table">
        <thead>
          <tr><th>Customer</th><th>Order ID</th><th>Date</th><th>Amount</th><th>Status</th></tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <td><div class="cust"><div class="avatar {{ $order['avatarClass'] }}">{{ $order['avatar'] }}</div><div><div class="name">{{ $order['name'] }}</div><div class="email">{{ $order['email'] }}</div></div></div></td>
              <td>{{ $order['order_id'] }}</td><td>{{ $order['date'] }}</td><td>{{ $order['amount'] }}</td>
              <td><span class="badge {{ $order['statusClass'] }}"><span class="b-dot"></span>{{ $order['status'] }}</span></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="card">
      <div class="card-head">
        <h3>Top Selling Products</h3>
      </div>
      <div class="card-body">
        @foreach ($products as $product)
          <div class="product-item">
            <div class="p-thumb">{{ $product['emoji'] }}</div>
            <div class="p-info">
              <div class="p-name">{{ $product['name'] }}</div>
              <div class="p-meta">{{ $product['meta'] }}</div>
              <div class="progress"><span style="width:{{ $product['progress'] }}"></span></div>
            </div>
            <div class="p-sales"><div class="p-amount">{{ $product['amount'] }}</div><div class="p-count">{{ $product['count'] }}</div></div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Low stock + Notifications -->
  <div class="grid-2">
    <div class="card">
      <div class="card-head">
        <div>
          <h3>Low Stock Alerts</h3>
          <div class="sub">Items that need restocking soon</div>
        </div>
        <button class="link-btn">Manage Inventory →</button>
      </div>
      <div class="card-body">
        @foreach ($stockAlerts as $alert)
          <div class="alert-item">
            <div class="alert-icon {{ $alert['iconClass'] }}">{{ $alert['icon'] }}</div>
            <div class="alert-body">
              <div class="alert-title">{{ $alert['title'] }}</div>
              <div class="alert-sub">{{ $alert['subtitle'] }}</div>
            </div>
            <span class="stock-pill {{ $alert['stateClass'] }}">{{ $alert['state'] }}</span>
          </div>
        @endforeach
      </div>
    </div>

    <div class="card">
      <div class="card-head">
        <h3>Notifications</h3>
        <button class="link-btn">Mark all read</button>
      </div>
      <div class="card-body">
        @foreach ($notifications as $notification)
          <div class="notif">
            <div class="n-icon {{ $notification['iconClass'] }}">{{ $notification['icon'] }}</div>
            <div>
              <div class="notif-text">{!! $notification['message'] !!}</div>
              <div class="notif-time">{{ $notification['time'] }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

</div>

      
    </div>
  </div>
</body>
</html>


