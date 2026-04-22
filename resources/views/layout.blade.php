<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'RoleRight' }} - Advanced Role & Right</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top left, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #e2e8f0;
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
        }
        .glass-sidebar {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .accent-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        }
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            border-color: rgba(99, 102, 241, 0.5);
        }
        .table-row-hover:hover {
            background: rgba(255, 255, 255, 0.02);
        }
    </style>
</head>
<body class="antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 glass-sidebar p-6 flex flex-col fixed h-full">
            <div class="mb-10 px-2">
                <h1 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-400">
                    RoleRight <span class="text-xs font-light text-slate-500 italic">v1.0</span>
                </h1>
            </div>

            <nav class="space-y-2 flex-1">
                <a href="{{ route('role-right.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('role-right.dashboard') ? 'accent-gradient text-white shadow-lg' : 'hover:bg-white/5 text-slate-400 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('role-right.roles.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('role-right.roles.*') ? 'accent-gradient text-white shadow-lg' : 'hover:bg-white/5 text-slate-400 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span>Roles</span>
                </a>
                <a href="{{ route('role-right.permissions.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('role-right.permissions.*') ? 'accent-gradient text-white shadow-lg' : 'hover:bg-white/5 text-slate-400 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                    <span>Permissions</span>
                </a>
                <a href="{{ route('role-right.audit-logs.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('role-right.audit-logs.*') ? 'accent-gradient text-white shadow-lg' : 'hover:bg-white/5 text-slate-400 hover:text-white' }} transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Audit Logs</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/5">
                <div class="flex items-center space-x-3 px-2">
                    <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center font-bold text-white">N</div>
                    <div>
                        <p class="text-sm font-semibold">Nirmal Modi</p>
                        <p class="text-xs text-slate-500">Super Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
