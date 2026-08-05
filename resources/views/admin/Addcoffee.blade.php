<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coffee Manage Dashboard</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/adminpartial.css') }}">
<style>
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
    --accent-soft:#fbf3ec;
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

  .menu-page{ display:grid; gap:18px; }

  /* ===== Page header ===== */
  .page-head{
    display:flex;align-items:center;justify-content:space-between;
    gap:16px;flex-wrap:wrap;
  }
  .page-head h1{font-size:24px;font-weight:800;color:var(--text-1);letter-spacing:-.02em}
  .page-head p{font-size:13.5px;color:var(--text-2);margin-top:2px}
  .head-actions{display:flex;gap:10px;align-items:center}
  .btn{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 20px;border-radius:24px;
    border:1px solid var(--border);background:var(--surface-2);
    color:var(--text);font-family:inherit;font-size:13.5px;font-weight:600;
    cursor:pointer;transition:.2s ease;
  }
  .btn:hover{background:var(--surface-3);transform:translateY(-1px)}
  .btn-primary{
    background:var(--accent);color:#fff;border-color:var(--accent);
    box-shadow:0 6px 18px rgba(200,112,58,.32);
  }
  .btn-primary:hover{background:var(--accent-deep);border-color:var(--accent-deep)}
  .btn-danger{background:var(--danger);color:#fff;border-color:var(--danger)}
  .btn-danger:hover{background:#c44a20;border-color:#c44a20}
  .btn-ghost{background:transparent;border:none;color:var(--text-2);padding:8px 12px}
  .btn-ghost:hover{color:var(--danger);background:var(--danger-soft)}
  .btn svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}

  /* ===== Stats strip ===== */
  .stats-strip{
    display:grid;grid-template-columns:repeat(4,1fr);gap:14px;
  }
  .stat-mini{
    background:var(--surface);border-radius:var(--radius-sm);
    padding:16px 18px;box-shadow:var(--shadow-sm);
    display:flex;align-items:center;gap:14px;
  }
  .stat-mini .sm-icon{
    width:42px;height:42px;border-radius:11px;flex-shrink:0;
    display:grid;place-items:center;font-size:19px;
  }
  .sm-1{background:var(--accent-soft);color:var(--accent)}
  .sm-2{background:var(--success-soft);color:var(--success)}
  .sm-3{background:var(--warning-soft);color:var(--warning)}
  .sm-4{background:var(--danger-soft);color:var(--danger)}
  .stat-mini .sm-val{font-size:20px;font-weight:800;color:var(--text-1);letter-spacing:-.02em}
  .stat-mini .sm-label{font-size:12px;color:var(--text-3);margin-top:1px}

  /* ===== Toolbar ===== */
  .toolbar{
    display:flex;align-items:center;justify-content:space-between;
    gap:14px;flex-wrap:wrap;
  }
  .toolbar-left{display:flex;gap:10px;align-items:center;flex-wrap:wrap}
  .search-box{position:relative}
  .search-box input{
    width:260px;padding:10px 14px 10px 38px;
    border:1px solid var(--border);border-radius:24px;
    background:var(--surface);color:var(--text-1);
    font-family:inherit;font-size:13.5px;outline:none;transition:.2s;
  }
  .search-box input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(200,112,58,.12)}
  .search-box svg{
    position:absolute;left:13px;top:50%;transform:translateY(-50%);
    width:16px;height:16px;stroke:var(--text-3);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;
  }
  .filter-chips{display:flex;gap:8px;flex-wrap:wrap}
  .fchip{
    padding:8px 14px;border-radius:20px;
    border:1.5px solid var(--border);background:var(--surface);
    font-size:13px;font-weight:600;color:var(--text-2);
    cursor:pointer;transition:.2s;
  }
  .fchip:hover{border-color:var(--accent-2);color:var(--accent)}
  .fchip.active{background:var(--accent);border-color:var(--accent);color:#fff}

  /* ===== Menu grid ===== */
  .menu-grid{
    display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
    gap:16px;
  }
  .menu-card{
    background:var(--surface);border-radius:var(--radius);
    box-shadow:var(--shadow);overflow:hidden;
    transition:.22s ease;position:relative;
  }
  .menu-card:hover{transform:translateY(-4px);box-shadow:0 16px 40px rgba(44,26,14,.13)}
  .mc-image{
    aspect-ratio:16/10;background:linear-gradient(135deg,var(--accent-soft),var(--surface-2));
    display:grid;place-items:center;position:relative;overflow:hidden;
  }
  .mc-image img{width:100%;height:100%;object-fit:cover}
  .mc-image .emoji{font-size:48px;filter:drop-shadow(0 3px 6px rgba(200,112,58,.15))}
  .mc-badges{position:absolute;top:10px;left:10px;display:flex;gap:6px}
  .mc-badge{
    padding:4px 10px;border-radius:8px;font-size:11px;font-weight:700;
    backdrop-filter:blur(4px);
  }
  .b-available{background:rgba(90,138,58,.92);color:#fff}
  .b-unavailable{background:rgba(224,90,43,.92);color:#fff}
  .b-featured{background:rgba(217,154,43,.92);color:#fff}
  .mc-actions{
    position:absolute;top:10px;right:10px;display:flex;gap:6px;
    opacity:0;transition:.2s;
  }
  .menu-card:hover .mc-actions{opacity:1}
  .mc-act{
    width:32px;height:32px;border-radius:9px;
    background:rgba(255,255,255,.92);border:none;
    display:grid;place-items:center;cursor:pointer;transition:.2s;
    backdrop-filter:blur(4px);
  }
  .mc-act:hover{background:#fff;transform:scale(1.08)}
  .mc-act svg{width:15px;height:15px;stroke:var(--text-2);fill:none;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
  .mc-act.del:hover svg{stroke:var(--danger)}

  .mc-body{padding:16px}
  .mc-cat{font-size:11px;font-weight:600;color:var(--accent);text-transform:uppercase;letter-spacing:.05em}
  .mc-name{font-size:16px;font-weight:700;color:var(--text-1);margin-top:3px;letter-spacing:-.01em}
  .mc-desc{font-size:12.5px;color:var(--text-2);margin-top:6px;line-height:1.45;
    display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
  .mc-foot{
    display:flex;align-items:center;justify-content:space-between;
    margin-top:14px;padding-top:14px;border-top:1px solid var(--border);
  }
  .mc-price{font-size:19px;font-weight:800;color:var(--accent)}
  .mc-sizes{display:flex;gap:5px}
  .mc-size{padding:3px 8px;border-radius:7px;background:var(--surface-2);font-size:11px;font-weight:600;color:var(--text-2)}

  /* ===== Empty add card ===== */
  .add-card{
    border:2px dashed var(--border);border-radius:var(--radius);
    display:flex;flex-direction:column;align-items:center;justify-content:center;
    gap:10px;min-height:240px;cursor:pointer;transition:.2s;
    background:transparent;
  }
  .add-card:hover{border-color:var(--accent);background:var(--accent-soft)}
  .add-card .ac-icon{
    width:56px;height:56px;border-radius:16px;
    background:var(--accent-soft);color:var(--accent);
    display:grid;place-items:center;transition:.2s;
  }
  .add-card:hover .ac-icon{background:var(--accent);color:#fff;transform:scale(1.05)}
  .add-card .ac-icon svg{width:26px;height:26px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
  .add-card .ac-title{font-size:15px;font-weight:700;color:var(--text-1)}
  .add-card .ac-sub{font-size:12.5px;color:var(--text-3)}

  /* ===== Modal ===== */
  .modal-overlay{
    position:fixed;inset:0;background:rgba(26,14,7,.55);
    backdrop-filter:blur(4px);z-index:2000;
    display:none;align-items:flex-start;justify-content:center;
    padding:40px 20px;overflow-y:auto;
  }
  .modal-overlay.open{display:flex;animation:fadeIn .2s ease}
  @keyframes fadeIn{from{opacity:0}to{opacity:1}}
  .modal{
    background:var(--surface);border-radius:22px;
    box-shadow:0 24px 60px rgba(26,14,7,.3);
    width:100%;max-width:640px;
    animation:slideUp .28s cubic-bezier(.2,.8,.2,1);
    margin:auto;
  }
  @keyframes slideUp{from{transform:translateY(24px);opacity:0}to{transform:translateY(0);opacity:1}}
  .modal-head{
    display:flex;align-items:center;justify-content:space-between;
    padding:20px 24px;border-bottom:1px solid var(--border);
  }
  .modal-head .mh-left{display:flex;align-items:center;gap:12px}
  .modal-head .mh-icon{
    width:42px;height:42px;border-radius:12px;
    background:var(--accent-soft);color:var(--accent);
    display:grid;place-items:center;
  }
  .modal-head .mh-icon svg{width:21px;height:21px;stroke:currentColor;fill:none;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
  .modal-head h2{font-size:18px;font-weight:800;color:var(--text-1);letter-spacing:-.01em}
  .modal-head .mh-sub{font-size:12.5px;color:var(--text-3);margin-top:1px}
  .modal-close{
    width:36px;height:36px;border-radius:10px;
    border:1px solid var(--border);background:var(--surface-2);
    display:grid;place-items:center;cursor:pointer;transition:.2s;
  }
  .modal-close:hover{background:var(--danger-soft);border-color:var(--danger)}
  .modal-close:hover svg{stroke:var(--danger)}
  .modal-close svg{width:18px;height:18px;stroke:var(--text-2);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;transition:.2s}

  .modal-body{padding:24px;max-height:62vh;overflow-y:auto}
  .modal-body::-webkit-scrollbar{width:6px}
  .modal-body::-webkit-scrollbar-thumb{background:var(--surface-3);border-radius:3px}

  .field{margin-bottom:18px}
  .field:last-child{margin-bottom:0}
  .field label{
    display:block;font-size:13px;font-weight:600;color:var(--text-1);margin-bottom:7px;
  }
  .field label .req{color:var(--danger)}
  .field .hint{font-size:11.5px;color:var(--text-3);margin-top:5px}
  .input,.textarea,.select{
    width:100%;padding:12px 14px;
    border:1px solid var(--border);border-radius:var(--radius-sm);
    background:var(--panel);color:var(--text-1);
    font-family:inherit;font-size:13.5px;outline:none;transition:.2s;
  }
  .input:focus,.textarea:focus,.select:focus{
    border-color:var(--accent);background:var(--surface);
    box-shadow:0 0 0 3px rgba(200,112,58,.12);
  }
  .input::placeholder,.textarea::placeholder{color:var(--text-3)}
  .textarea{resize:vertical;min-height:72px;line-height:1.5}
  .select{
    cursor:pointer;appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%237a5a45' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    background-repeat:no-repeat;background-position:right 14px center;padding-right:38px;
  }
  .row-2{display:grid;grid-template-columns:1fr 1fr;gap:14px}
  .row-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px}

  .input-prefix{position:relative}
  .input-prefix .pre{
    position:absolute;left:14px;top:50%;transform:translateY(-50%);
    color:var(--text-3);font-size:14px;font-weight:600;pointer-events:none;
  }
  .input-prefix .input{padding-left:30px}

  /* Size mini-cards in modal */
  .m-sizes{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
  .m-size{
    border:1.5px solid var(--border);border-radius:var(--radius-sm);
    padding:12px;cursor:pointer;transition:.2s;background:var(--panel);
  }
  .m-size:hover{border-color:var(--accent-2)}
  .m-size.selected{border-color:var(--accent);background:var(--accent-soft);box-shadow:0 0 0 3px rgba(200,112,58,.1)}
  .m-size .ms-name{font-size:12.5px;font-weight:700;color:var(--text-1);margin-bottom:6px;display:flex;align-items:center;gap:6px}
  .m-size .ms-price{
    width:100%;padding:7px 8px;border:1px solid var(--border);
    border-radius:8px;background:var(--surface);font-size:12.5px;
    font-weight:600;color:var(--text-1);outline:none;font-family:inherit;
  }
  .m-size .ms-price:focus{border-color:var(--accent)}

  /* Chips in modal */
  .m-chips{display:flex;flex-wrap:wrap;gap:7px}
  .m-chip{
    padding:7px 13px;border-radius:20px;
    border:1.5px solid var(--border);background:var(--panel);
    font-size:12.5px;font-weight:600;color:var(--text-2);
    cursor:pointer;transition:.2s;
  }
  .m-chip:hover{border-color:var(--accent-2);color:var(--accent)}
  .m-chip.selected{background:var(--accent);border-color:var(--accent);color:#fff}

  /* Toggle in modal */
  .m-toggle-row{
    display:flex;align-items:center;justify-content:space-between;
    padding:12px 14px;border-radius:var(--radius-sm);
    background:var(--panel);border:1px solid var(--border);
  }
  .m-toggle-row + .m-toggle-row{margin-top:8px}
  .m-toggle-info .mt-label{font-size:13px;font-weight:600;color:var(--text-1)}
  .m-toggle-info .mt-sub{font-size:11px;color:var(--text-3);margin-top:1px}
  .toggle{
    position:relative;width:42px;height:23px;flex-shrink:0;
    background:var(--surface-3);border-radius:12px;cursor:pointer;transition:.25s;
  }
  .toggle.on{background:var(--accent)}
  .toggle::after{
    content:"";position:absolute;top:3px;left:3px;
    width:17px;height:17px;border-radius:50%;background:#fff;
    box-shadow:0 2px 5px rgba(0,0,0,.15);transition:.25s;
  }
  .toggle.on::after{left:22px}

  /* Image upload in modal */
  .m-upload{
    border:2px dashed var(--border);border-radius:var(--radius-sm);
    padding:24px;text-align:center;cursor:pointer;transition:.2s;
    background:var(--panel);
  }
  .m-upload:hover{border-color:var(--accent);background:var(--accent-soft)}
  .m-upload .mu-icon{
    width:48px;height:48px;border-radius:14px;
    background:var(--accent-soft);color:var(--accent);
    display:grid;place-items:center;margin:0 auto 10px;
  }
  .m-upload .mu-icon svg{width:22px;height:22px;stroke:currentColor;fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
  .m-upload .mu-title{font-size:13px;font-weight:700;color:var(--text-1)}
  .m-upload .mu-sub{font-size:11.5px;color:var(--text-3);margin-top:3px}

  .modal-foot{
    display:flex;align-items:center;justify-content:space-between;
    gap:12px;padding:18px 24px;border-top:1px solid var(--border);background:var(--panel);
  }
  .foot-note{font-size:12px;color:var(--text-3);display:flex;align-items:center;gap:6px}
  .foot-note svg{width:14px;height:14px;stroke:var(--text-3);fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
  .modal-foot .right{display:flex;gap:10px}

  /* Section divider in modal */
  .m-section{
    font-size:11px;font-weight:700;color:var(--text-3);
    text-transform:uppercase;letter-spacing:.06em;
    margin:20px 0 12px;padding-bottom:8px;border-bottom:1px solid var(--border);
  }
  .m-section:first-child{margin-top:0}

  /* ===== Responsive ===== */
  @media (max-width:1024px){
    .stats-strip{grid-template-columns:repeat(2,1fr)}
  }
  @media (max-width:640px){
    .stats-strip{grid-template-columns:1fr}
    .row-2,.row-3,.m-sizes{grid-template-columns:1fr}
    .search-box input{width:100%}
    .page-head h1{font-size:21px}
    .head-actions{width:100%}
    .head-actions .btn{flex:1;justify-content:center}
    .modal-foot{flex-direction:column;align-items:stretch}
    .modal-foot .right{justify-content:flex-end}
  }</style>
</head>
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


<!-- ===== Drop this inside your .content main area ===== -->
<div class="menu-page">

  <!-- Page header -->
  <div class="page-head">
    <div>
      <h1>Menu Manager</h1>
      <p>Manage your coffee shop's menu items</p>
    </div>
    @if (session('success'))
      <div class="alert-success" style="padding:10px 14px;border-radius:10px;background:#e7f7ea;color:#1f6f3b;font-weight:600;">{{ session('success') }}</div>
    @endif
    <div class="head-actions">
      <button class="btn">
        <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Export
      </button>
      <button class="btn btn-primary" onclick="openModal()">
        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Add Coffee
      </button>
    </div>
  </div>

  <!-- Stats strip -->
  <div class="stats-strip">
    <div class="stat-mini">
      <div class="sm-icon sm-1">☕</div>
      <div><div class="sm-val">24</div><div class="sm-label">Total Items</div></div>
    </div>
    <div class="stat-mini">
      <div class="sm-icon sm-2">✓</div>
      <div><div class="sm-val">21</div><div class="sm-label">Available</div></div>
    </div>
    <div class="stat-mini">
      <div class="sm-icon sm-3">★</div>
      <div><div class="sm-val">6</div><div class="sm-label">Featured</div></div>
    </div>
    <div class="stat-mini">
      <div class="sm-icon sm-4">⚠</div>
      <div><div class="sm-val">3</div><div class="sm-label">Unavailable</div></div>
    </div>
  </div>

  <!-- Toolbar -->
  <div class="toolbar">
    <div class="toolbar-left">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" placeholder="Search menu..." />
      </div>
      <div class="filter-chips">
        <span class="fchip active">All</span>
        <span class="fchip">Hot Coffee</span>
        <span class="fchip">Iced</span>
        <span class="fchip">Espresso</span>
        <span class="fchip">Pastries</span>
      </div>
    </div>
  </div>

  <!-- Menu grid -->
  <div class="menu-grid" id="menuGrid">
    @foreach ($coffees as $coffee)
      <div class="menu-card">
        <div class="mc-image">
          <img src="{{ $coffee->image_url ?: 'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=400' }}" alt="{{ $coffee->name }}" />
          <div class="mc-badges">
            @if ($coffee->is_available)
              <span class="mc-badge b-available">Available</span>
            @else
              <span class="mc-badge b-unavailable">Unavailable</span>
            @endif
            @if ($coffee->is_featured)
              <span class="mc-badge b-featured">★ Featured</span>
            @endif
          </div>
        </div>
        <div class="mc-body">
          <div class="mc-cat">{{ $coffee->category }}</div>
          <div class="mc-name">{{ $coffee->name }}</div>
          <div class="mc-desc">{{ $coffee->description ?: 'Freshly prepared item from the admin menu.' }}</div>
          <div class="mc-foot">
            <div class="mc-price">${{ number_format($coffee->price, 2) }}</div>
            <div class="mc-sizes"><span class="mc-size">{{ $coffee->roast_type ?: 'Regular' }}</span></div>
          </div>
          <div class="mc-actions" style="display:flex;gap:8px;margin-top:12px;">
            <button type="button" class="btn" style="flex:1;justify-content:center;" onclick="openEditModal({{ $coffee->id }}, '{{ addslashes($coffee->name) }}', '{{ addslashes($coffee->description ?? '') }}', '{{ addslashes($coffee->category ?? '') }}', '{{ addslashes($coffee->roast_type ?? '') }}', '{{ $coffee->price }}', '{{ addslashes($coffee->image_url ?? '') }}', '{{ $coffee->is_available ? '1' : '0' }}', '{{ $coffee->is_featured ? '1' : '0' }}', '{{ $coffee->is_customizable ? '1' : '0' }}')">Edit</button>
            <form method="POST" action="{{ route('admin.addcoffee.destroy', $coffee) }}" onsubmit="return confirm('Delete this coffee item?')" style="flex:1;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn" style="width:100%;justify-content:center;background:#fce8e8;color:#b42318;">Delete</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach

    <!-- Add new card -->
    <div class="add-card" onclick="openModal()">
      <div class="ac-icon"><svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
      <div class="ac-title">Add New Item</div>
      <div class="ac-sub">Create a new coffee or pastry</div>
    </div>

  </div>
</div>

<!-- ===== Add Coffee Modal ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <div class="modal-head">
      <div class="mh-left">
        <div class="mh-icon">
          <svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <div>
          <h2>Add New Coffee</h2>
          <div class="mh-sub">Fill in the details to add this item to your menu</div>
        </div>
      </div>
      <button class="modal-close" onclick="closeModal()">
        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <div class="modal-body">

      <!-- Basic info -->
      <div class="m-section">Basic Information</div>

      <form method="POST" id="coffeeForm" action="{{ route('admin.addcoffee.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">

      <div class="field">
        <label>Coffee Name <span class="req">*</span></label>
        <input class="input" name="name" id="coffeeName" placeholder="e.g. Caramel Macchiato" required />
      </div>

      <div class="field">
        <label>Description</label>
        <textarea class="textarea" name="description" id="coffeeDescription" placeholder="Describe the taste, ingredients, and what makes it special..."></textarea>
        <div class="hint">Max 200 characters — shown on the menu card</div>
      </div>

      <div class="row-2">
        <div class="field">
          <label>Category <span class="req">*</span></label>
          <select class="select" name="category" id="coffeeCategory">
            <option>Hot Coffee</option>
            <option>Iced Coffee</option>
            <option>Espresso</option>
            <option>Specialty</option>
            <option>Seasonal</option>
            <option>Pastries</option>
          </select>
        </div>
        <div class="field">
          <label>Roast Type</label>
          <select class="select" name="roast_type" id="coffeeRoastType">
            <option>Medium Roast</option>
            <option>Light Roast</option>
            <option>Dark Roast</option>
            <option>Blonde</option>
            <option>N/A</option>
          </select>
        </div>
      </div>

      <!-- Pricing -->
      <div class="m-section">Pricing &amp; Sizes</div>

      <div class="field">
        <label>Available Sizes <span class="req">*</span></label>
        <div class="m-sizes">
          <div class="m-size selected" onclick="this.classList.toggle('selected')">
            <div class="ms-name">☕ Small</div>
            <input class="ms-price" placeholder="$0.00" value="$3.50" onclick="event.stopPropagation()" />
          </div>
          <div class="m-size selected" onclick="this.classList.toggle('selected')">
            <div class="ms-name">☕ Medium</div>
            <input class="ms-price" placeholder="$0.00" value="$4.50" onclick="event.stopPropagation()" />
          </div>
          <div class="m-size" onclick="this.classList.toggle('selected')">
            <div class="ms-name">☕ Large</div>
            <input class="ms-price" placeholder="$0.00" value="$5.25" onclick="event.stopPropagation()" />
          </div>
        </div>
      </div>

      <div class="field">
        <label>Price</label>
        <div class="input-prefix">
          <span class="pre">$</span>
          <input class="input" name="price" id="coffeePrice" placeholder="0.00" required />
        </div>
      </div>

      <div class="field">
        <label>Upload Image</label>
        <input class="input" type="file" name="image" id="coffeeImage" accept="image/*" />
        <div class="hint">PNG, JPG, WEBP up to 2MB</div>
      </div>

      <!-- Tags -->
      <div class="m-section">Tags &amp; Extras</div>

      <div class="field">
        <label>Flavor Tags</label>
        <div class="m-chips">
          <span class="m-chip selected" onclick="this.classList.toggle('selected')">Caramel</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Sweet</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Vanilla</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Chocolate</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Nutty</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Fruity</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Bold</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Creamy</span>
        </div>
      </div>

      <div class="field">
        <label>Milk Options</label>
        <div class="m-chips">
          <span class="m-chip selected" onclick="this.classList.toggle('selected')">Whole Milk</span>
          <span class="m-chip selected" onclick="this.classList.toggle('selected')">Oat Milk</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Almond Milk</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Soy Milk</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Skim Milk</span>
          <span class="m-chip" onclick="this.classList.toggle('selected')">Coconut Milk</span>
        </div>
      </div>

      <!-- Image -->
      <div class="m-section">Product Image</div>
      <div class="field">
        <div class="m-upload">
          <div class="mu-icon"><svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg></div>
          <div class="mu-title">Drop image here or click to upload</div>
          <div class="mu-sub">PNG, JPG up to 5MB — 1:1 recommended</div>
        </div>
      </div>

      <!-- Settings -->
      <div class="m-section">Availability &amp; Settings</div>

      <div class="m-toggle-row">
        <div class="m-toggle-info">
          <div class="mt-label">Available on menu</div>
          <div class="mt-sub">Customers can see and order this item</div>
        </div>
        <input type="hidden" name="is_available" value="1" id="is_available_input">
        <div class="toggle on" data-input="is_available_input" onclick="toggleSwitch(this)"></div>
      </div>

      <div class="m-toggle-row">
        <div class="m-toggle-info">
          <div class="mt-label">Featured item</div>
          <div class="mt-sub">Highlight on the homepage menu</div>
        </div>
        <input type="hidden" name="is_featured" value="0" id="is_featured_input">
        <div class="toggle" data-input="is_featured_input" onclick="toggleSwitch(this)"></div>
      </div>

      <div class="m-toggle-row">
        <div class="m-toggle-info">
          <div class="mt-label">Customizable</div>
          <div class="mt-sub">Allow extra shots, syrups, and milk swaps</div>
        </div>
        <input type="hidden" name="is_customizable" value="1" id="is_customizable_input">
        <div class="toggle on" data-input="is_customizable_input" onclick="toggleSwitch(this)"></div>
      </div>

      <div class="row-2" style="margin-top:16px">
        <div class="field" style="margin:0">
          <label>Available From</label>
          <input class="input" type="time" value="06:00" />
        </div>
        <div class="field" style="margin:0">
          <label>Available Until</label>
          <input class="input" type="time" value="22:00" />
        </div>
      </div>

    </div>

    <div class="modal-foot">
      <div class="foot-note">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        Changes go live immediately
      </div>
      <div class="right">
        <button class="btn" type="button" onclick="closeModal()">Cancel</button>
        <button class="btn btn-primary" type="submit">
          <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          Add to Menu
        </button>
      </form>
      </div>
    </div>
  </div>
</div>

<script>
  let currentCoffeeId = null;

  function openModal(){
    currentCoffeeId = null;
    document.getElementById('coffeeForm').action = '{{ route('admin.addcoffee.store') }}';
    document.getElementById('formMethod').value = 'POST';
    document.querySelector('.modal-head h2').textContent = 'Add New Coffee';
    document.querySelector('.mh-sub').textContent = 'Fill in the details to add this item to your menu';
    document.querySelector('.btn-primary[type="submit"]').innerHTML = '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Add to Menu';
    document.getElementById('coffeeForm').reset();
    document.getElementById('is_available_input').value = '1';
    document.getElementById('is_featured_input').value = '0';
    document.getElementById('is_customizable_input').value = '1';
    document.querySelectorAll('.toggle').forEach(toggle => toggle.classList.remove('on'));
    document.querySelector('.toggle[data-input="is_available_input"]').classList.add('on');
    document.querySelector('.toggle[data-input="is_customizable_input"]').classList.add('on');
    document.getElementById('modalOverlay').classList.add('open');
    document.body.style.overflow='hidden';
  }

  function openEditModal(id, name, description, category, roastType, price, imageUrl, isAvailable, isFeatured, isCustomizable){
    currentCoffeeId = id;
    document.getElementById('coffeeForm').action = '/admin/addcoffee/' + id;
    document.getElementById('formMethod').value = 'PUT';
    document.querySelector('.modal-head h2').textContent = 'Edit Coffee';
    document.querySelector('.mh-sub').textContent = 'Update the details for this item';
    document.querySelector('.btn-primary[type="submit"]').innerHTML = '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Save Changes';
    document.getElementById('coffeeName').value = name;
    document.getElementById('coffeeDescription').value = description;
    document.getElementById('coffeeCategory').value = category;
    document.getElementById('coffeeRoastType').value = roastType;
    document.getElementById('coffeePrice').value = price;
    document.getElementById('coffeeImage').value = '';
    document.getElementById('is_available_input').value = isAvailable;
    document.getElementById('is_featured_input').value = isFeatured;
    document.getElementById('is_customizable_input').value = isCustomizable;
    document.querySelectorAll('.toggle').forEach(toggle => toggle.classList.remove('on'));
    if (isAvailable === '1') document.querySelector('.toggle[data-input="is_available_input"]').classList.add('on');
    if (isFeatured === '1') document.querySelector('.toggle[data-input="is_featured_input"]').classList.add('on');
    if (isCustomizable === '1') document.querySelector('.toggle[data-input="is_customizable_input"]').classList.add('on');
    document.getElementById('modalOverlay').classList.add('open');
    document.body.style.overflow='hidden';
  }

  function closeModal(){
    document.getElementById('modalOverlay').classList.remove('open');
    document.body.style.overflow='';
    currentCoffeeId = null;
  }
  function toggleSwitch(el){
    const input = document.getElementById(el.dataset.input);
    if (!input) return;
    input.value = input.value === '1' ? '0' : '1';
    el.classList.toggle('on');
  }
  document.getElementById('modalOverlay').addEventListener('click',function(e){
    if(e.target===this) closeModal();
  });
  document.addEventListener('keydown',function(e){
    if(e.key==='Escape') closeModal();
  });
  // Filter chips
  document.querySelectorAll('.fchip').forEach(c=>{
    c.addEventListener('click',()=>{
      document.querySelectorAll('.fchip').forEach(x=>x.classList.remove('active'));
      c.classList.add('active');
    });
  });
</script>

</body>
</html>


      
    </div>
  </div>
</body>
</html>


