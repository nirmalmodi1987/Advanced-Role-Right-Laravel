@extends('role-right::layout', ['title' => 'Manage Roles'])

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h2 class="text-3xl font-bold text-white">Role Management</h2>
        <p class="text-slate-400 mt-1">Define and organize user access levels.</p>
    </div>
    <a href="{{ route('role-right.roles.create') }}" class="px-5 py-2.5 rounded-xl accent-gradient text-white shadow-lg shadow-indigo-500/20 text-sm font-medium flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Create New Role
    </a>
</header>

<div class="glass-card overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b border-white/5 bg-white/5">
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Role Name</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Permissions</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Users</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Created At</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($roles as $role)
            <tr class="table-row-hover transition-all">
                <td class="px-6 py-4">
                    <div class="font-semibold text-white">{{ $role->name }}</div>
                    <div class="text-xs text-slate-500">{{ $role->slug }}</div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2.5 py-1 rounded-full bg-indigo-500/10 text-indigo-400 text-xs font-medium border border-indigo-500/20">
                        {{ $role->permissions_count }} Permissions
                    </span>
                </td>
                <td class="px-6 py-4 text-slate-300 text-sm">
                    {{ $role->users_count }} Users
                </td>
                <td class="px-6 py-4 text-slate-500 text-xs">
                    {{ $role->created_at->format('M d, Y') }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('role-right.roles.permissions.edit', $role) }}" class="p-2 rounded-lg hover:bg-white/5 text-slate-400 hover:text-white transition-all" title="Edit Permissions">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('role-right.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg hover:bg-red-500/10 text-slate-400 hover:text-red-400 transition-all" title="Delete Role">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-slate-500">No roles found. Start by creating one!</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
