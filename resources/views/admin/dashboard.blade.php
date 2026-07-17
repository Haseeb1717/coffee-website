<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee POS Dashboard</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f0ece8;
            color: #2c1a0e;
            margin: 0;
        }

        .app-shell {
            display: flex;
            min-height: 100vh;
        }

        .main-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #f7f3f0;
        }

        .sidebar {
            width: 72px;
            background: #2c1a0e;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            flex-shrink: 0;
            border-radius: 0 20px 20px 0;
        }

        .sidebar-logo {
            width: 42px;
            height: 42px;
            background: #c8703a;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
            color: #fff;
            letter-spacing: -1px;
            margin-bottom: 36px;
            flex-shrink: 0;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            flex: 1;
            width: 100%;
        }

        .nav-item {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 12px 0;
            cursor: pointer;
            position: relative;
            transition: background 0.2s;
        }

        .nav-item span.label {
            font-size: 10px;
            color: #7a5a45;
            font-weight: 500;
            letter-spacing: 0.02em;
            transition: color 0.2s;
        }

        .nav-item svg {
            width: 22px;
            height: 22px;
            stroke: #7a5a45;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: stroke 0.2s;
        }

        .nav-item:hover svg { stroke: #e0a070; }
        .nav-item:hover span.label { color: #e0a070; }
        .nav-item.active { background: #3d2410; }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 36px;
            background: #c8703a;
            border-radius: 0 4px 4px 0;
        }

        .nav-item.active svg { stroke: #c8703a; }
        .nav-item.active span.label { color: #c8703a; }

        .sidebar-logout {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 12px 0;
            cursor: pointer;
            margin-top: auto;
        }

        .sidebar-logout svg {
            width: 22px;
            height: 22px;
            stroke: #7a5a45;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: stroke 0.2s;
        }

        .sidebar-logout span.label {
            font-size: 10px;
            color: #7a5a45;
            font-weight: 500;
            transition: color 0.2s;
        }

        .sidebar-logout:hover svg { stroke: #e07070; }
        .sidebar-logout:hover span.label { color: #e07070; }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 28px;
            background: #f7f3f0;
            flex-shrink: 0;
            gap: 20px;
        }

        .header-title {
            font-size: 22px;
            font-weight: 700;
            color: #1a0e07;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .header-search {
            flex: 1;
            max-width: 360px;
            position: relative;
        }

        .header-search input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: none;
            border-radius: 24px;
            background: #ede8e3;
            font-size: 13.5px;
            color: #3d2410;
            outline: none;
            font-family: inherit;
            transition: background 0.2s, box-shadow 0.2s;
        }

        .header-search input::placeholder { color: #b0907a; }
        .header-search input:focus {
            background: #e5ddd6;
            box-shadow: 0 0 0 2px #c8703a44;
        }

        .header-search svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            stroke: #b0907a;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
        }

        .notif-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ede8e3;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            transition: background 0.2s;
            border: none;
        }

        .notif-btn:hover { background: #e0d8d0; }
        .notif-btn svg {
            width: 18px;
            height: 18px;
            stroke: #2c1a0e;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .notif-badge {
            position: absolute;
            top: 8px;
            right: 9px;
            width: 7px;
            height: 7px;
            background: #e05a2b;
            border-radius: 50%;
            border: 1.5px solid #f7f3f0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 10px 5px 5px;
            border-radius: 24px;
            transition: background 0.2s;
        }

        .user-profile:hover { background: #ede8e3; }
        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            background: #c8a882;
            flex-shrink: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-role {
            font-size: 10px;
            color: #b0907a;
            font-weight: 500;
        }

        .user-name {
            font-size: 13px;
            font-weight: 700;
            color: #1a0e07;
        }

        .content {
            flex: 1;
            padding: 24px 28px;
            display: grid;
            gap: 18px;
            overflow: auto;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(44, 26, 14, 0.08);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .footer-bar {
            padding: 12px 28px;
            background: #ede8e3;
            color: #7a5a45;
            font-size: 13px;
            text-align: right;
        }
    /* ================= RESPONSIVE DESIGN ================= */

/* Tablet */
@media (max-width: 1024px) {

    .header {
        padding: 18px 20px;
    }

    .content {
        padding: 20px;
    }

    .header-title {
        font-size: 20px;
    }

    .header-search {
        max-width: 280px;
    }

    .user-info {
        display: none;
    }

    .card-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


/* Mobile */
@media (max-width: 768px) {

    .app-shell {
        flex-direction: column;
    }


    /* Move sidebar to bottom like mobile navigation */
    .sidebar {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 70px;
        border-radius: 20px 20px 0 0;
        flex-direction: row;
        justify-content: space-around;
        padding: 8px 10px;
        z-index: 1000;
    }


    .sidebar-logo {
        display: none;
    }


    .sidebar-nav {
        flex-direction: row;
        justify-content: space-around;
        gap: 0;
    }


    .nav-item {
        width: auto;
        padding: 8px 12px;
    }


    .nav-item span.label,
    .sidebar-logout span.label {
        font-size: 9px;
    }


    .nav-item svg,
    .sidebar-logout svg {
        width: 20px;
        height: 20px;
    }


    .nav-item.active::before {
        display: none;
    }


    .sidebar-logout {
        width: auto;
        margin: 0;
        padding: 8px 12px;
    }


    .main-panel {
        width: 100%;
        padding-bottom: 80px;
    }


    .header {
        flex-wrap: wrap;
        padding: 16px;
        gap: 12px;
    }


    .header-title {
        width: 100%;
        font-size: 19px;
    }


    .header-search {
        order: 3;
        width: 100%;
        max-width: 100%;
    }


    .header-actions {
        margin-left: auto;
    }


    .user-profile {
        padding-right: 0;
    }


    .user-avatar {
        width: 34px;
        height: 34px;
    }


    .content {
        padding: 16px;
        gap: 14px;
    }


    .card {
        padding: 16px;
        border-radius: 14px;
    }


    .card-grid {
        grid-template-columns: 1fr;
    }


    .footer-bar {
        padding: 12px 16px;
        text-align: center;
    }

}



/* Small Mobile */
@media (max-width: 480px) {


    .header-actions {
        gap: 8px;
    }


    .notif-btn {
        width: 36px;
        height: 36px;
    }


    .user-avatar {
        width: 32px;
        height: 32px;
    }


    .content {
        padding: 12px;
    }


    .nav-item {
        padding: 6px 8px;
    }


    .nav-item span.label {
        display: none;
    }


    .sidebar-logout span.label {
        display: none;
    }


}
    </style>
</head>
<body>
    <div class="app-shell">
        @include('partial.sidebar')

        <div class="main-panel">
            @include('partial.header')
            @include('partial.main')
        </div>
    </div>

    @include('partial.footer')
</body>
</html>