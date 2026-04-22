@extends('role-right::layout', ['title' => 'Manage Permissions'])

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h2 class="text-3xl font-bold text-white">Permissions Registry</h2>
        <p class="text-slate-400 mt-1">Define atomic rights and group them by module.</p>
    </div>
    <div class="flex space-x-3">
        <button class="px-5 py-2.5 rounded-xl border border-white/10 hover:bg-white/5 transition-all text-sm font-medium text-indigo-400 flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            Auto-Discover
        </button>
        <a href="{{ route('role-right.permissions.create') }}" class="px-5 py-2.5 rounded-xl accent-gradient text-white shadow-lg shadow-indigo-500/20 text-sm font-medium flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Permission
        </a>
    </div>
</header>

<div class="space-y-8">
    @forelse($permissions as $group => $groupPermissions)
    <div class="glass-card overflow-hidden">
        <div class="px-6 py-4 bg-white/5 border-b border-white/5 flex justify-between items-center">
            <h3 class="text-sm font-bold uppercase tracking-widest text-indigo-400">{{ $group }}</h3>
            <span class="text-xs text-slate-500">{{ count($groupPermissions) }} Permissions</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 divide-y md:divide-y-0 md:divide-x divide-white/5">
            @foreach($groupPermissions as $permission)
            <div class="p-6 hover:bg-white/5 transition-all group">
                <div class="flex justify-between items-start mb-2">
                    <span class="font-semibold text-white group-hover:text-indigo-400 transition-colors">{{ $permission->name }}</span>
                    <form action="{{ route('role-right.permissions.destroy', $permission) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-slate-600 hover:text-red-400 opacity-0 group-hover:opacity-100 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
                <p class="text-xs text-slate-500 mb-1">Slug: <code class="text-indigo-300/70">{{ $permission->slug }}</code></p>
                <p class="text-xs text-slate-400 line-clamp-2 italic">{{ $permission->description ?? 'No description provided.' }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @empty
    <div class="glass-card p-12 text-center">
        <div class="flex flex-col items-center">
            <svg class="w-16 h-16 text-slate-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
            <h3 class="text-xl font-bold text-white mb-2">No Permissions Found</h3>
            <p class="text-slate-500 max-w-sm mx-auto mb-6">Permissions are the core of your security. Start by adding a few or use Auto-Discovery.</p>
            <a href="{{ route('role-right.permissions.create') }}" class="px-8 py-3 rounded-xl accent-gradient text-white shadow-lg text-sm font-bold">
                Create First Permission
            </a>
        </div>
    </div>
    @endforelse
</div>
@endsection
