@extends('role-right::layout', ['title' => 'Dashboard'])

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h2 class="text-3xl font-bold text-white">Dashboard Overview</h2>
        <p class="text-slate-400 mt-1">Manage your application's security and access control.</p>
    </div>
    <div class="flex space-x-4">
        <button class="px-5 py-2.5 rounded-xl border border-white/10 hover:bg-white/5 transition-all text-sm font-medium">Documentation</button>
        <button class="px-5 py-2.5 rounded-xl accent-gradient text-white shadow-lg shadow-indigo-500/20 text-sm font-medium">Support</button>
    </div>
</header>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="glass-card p-6 hover-glow transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-indigo-500/10 rounded-xl">
                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <span class="text-xs font-semibold text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full">+12%</span>
        </div>
        <h3 class="text-slate-400 text-sm font-medium">Total Users</h3>
        <p class="text-3xl font-bold text-white mt-1">1,284</p>
    </div>
    <div class="glass-card p-6 hover-glow transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-500/10 rounded-xl">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04 Pel6 11.952 11.952 0 00-1.296 9.123c.592 2.815 2.857 5.134 5.662 6.191l.71.267.71-.267c2.805-1.057 5.07-3.376 5.662-6.191a11.952 11.952 0 00-1.296-9.123z"></path></svg>
            </div>
            <span class="text-xs font-semibold text-purple-400 bg-purple-400/10 px-2 py-1 rounded-full">Active</span>
        </div>
        <h3 class="text-slate-400 text-sm font-medium">Roles Defined</h3>
        <p class="text-3xl font-bold text-white mt-1">12</p>
    </div>
    <div class="glass-card p-6 hover-glow transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-amber-500/10 rounded-xl">
                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
            </div>
            <span class="text-xs font-semibold text-slate-400 bg-white/5 px-2 py-1 rounded-full">Global</span>
        </div>
        <h3 class="text-slate-400 text-sm font-medium">Total Permissions</h3>
        <p class="text-3xl font-bold text-white mt-1">84</p>
    </div>
</div>

<!-- Content Area -->
<div class="glass-card p-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-white">Recent Activity</h3>
        <button class="text-indigo-400 hover:text-indigo-300 text-sm font-semibold">View All</button>
    </div>
    
    <div class="space-y-6">
        <div class="flex items-start space-x-4 pb-6 border-b border-white/5">
            <div class="p-2 bg-emerald-500/20 rounded-lg">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <p class="text-sm text-white font-medium">Role "Editor" updated</p>
                <p class="text-xs text-slate-500 mt-1">Added permission "delete-post" by Nirmal • 2 mins ago</p>
            </div>
        </div>
        <div class="flex items-start space-x-4 pb-6 border-b border-white/5">
            <div class="p-2 bg-indigo-500/20 rounded-lg">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
            <div>
                <p class="text-sm text-white font-medium">New Role "Finance" created</p>
                <p class="text-xs text-slate-500 mt-1">Created by Admin • 1 hour ago</p>
            </div>
        </div>
    </div>
</div>
@endsection
