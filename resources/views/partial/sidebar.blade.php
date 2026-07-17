<aside class="sidebar">
    <div class="sidebar-logo">K</div>

    <nav class="sidebar-nav">
        <div class="nav-item active" title="Dashboard">
            <svg viewBox="0 0 24 24">
                <path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5z"/>
                <path d="M9 21V12h6v9"/>
            </svg>
            <span class="label">Home</span>
        </div>

        <div class="nav-item" title="Menu">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            <span class="label">Menu</span>
        </div>

        <div class="nav-item" title="History">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="9"/>
                <path d="M12 7v5l3 3"/>
            </svg>
            <span class="label">History</span>
        </div>

        <div class="nav-item" title="Wallet">
            <svg viewBox="0 0 24 24">
                <rect x="2" y="6" width="20" height="14" rx="2"/>
                <path d="M16 13a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                <path d="M2 10h20"/>
            </svg>
            <span class="label">Wallet</span>
        </div>

        <div class="nav-item" title="Promos">
            <svg viewBox="0 0 24 24">
                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                <line x1="7" y1="7" x2="7.01" y2="7"/>
            </svg>
            <span class="label">Promos</span>
        </div>

        <div class="nav-item" title="Settings">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
            <span class="label">Settings</span>
        </div>
    </nav>

    <form method="POST" action="{{ route('logout') }}" class="sidebar-logout" title="Logout" style="background:none;border:none;padding:0;">
        @csrf
        <button type="submit" style="background:none;border:none;padding:0;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:5px;">
            <svg viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
            <span class="label">Logout</span>
        </button>
    </form>
</aside>
