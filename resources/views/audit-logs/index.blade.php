@extends('role-right::layout', ['title' => 'Security Audit Logs'])

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h2 class="text-3xl font-bold text-white">Security Audit Logs</h2>
        <p class="text-slate-400 mt-1">Chronological history of all role and permission changes.</p>
    </div>
    <div class="flex space-x-3">
        <button class="px-5 py-2.5 rounded-xl border border-white/10 hover:bg-white/5 transition-all text-sm font-medium text-slate-400 flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            Export Logs
        </button>
    </div>
</header>

<div class="glass-card overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b border-white/5 bg-white/5">
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Timestamp</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">User</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Action</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">Target</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400">IP Address</th>
                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-400 text-right">Details</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($logs as $log)
            <tr class="table-row-hover transition-all">
                <td class="px-6 py-4 text-slate-300 text-xs font-medium">
                    {{ $log->created_at->format('M d, Y') }}<br>
                    <span class="text-slate-500">{{ $log->created_at->format('H:i:s') }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-7 h-7 rounded-full bg-white/5 flex items-center justify-center text-[10px] font-bold text-indigo-400 border border-white/10">
                            {{ substr($log->user?->name ?? 'S', 0, 1) }}
                        </div>
                        <span class="text-sm font-medium text-white">{{ $log->user?->name ?? 'System' }}</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    @php
                        $color = match($log->action) {
                            'role_created', 'permission_created' => 'text-emerald-400 bg-emerald-400/10 border-emerald-400/20',
                            'role_deleted', 'permission_deleted' => 'text-red-400 bg-red-400/10 border-red-400/20',
                            'permissions_mapped' => 'text-indigo-400 bg-indigo-400/10 border-indigo-400/20',
                            default => 'text-slate-400 bg-white/5 border-white/10'
                        };
                    @endphp
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border {{ $color }}">
                        {{ str_replace('_', ' ', $log->action) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm text-slate-300">
                    <span class="text-slate-500 italic">{{ $log->target_type }}:</span> {{ $log->changes['name'] ?? $log->changes['role'] ?? 'ID: '.$log->target_id }}
                </td>
                <td class="px-6 py-4 text-xs text-slate-500 font-mono">
                    {{ $log->ip_address }}
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">Details</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center">
                    <p class="text-slate-500">No audit logs recorded yet.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($logs->hasPages())
    <div class="px-6 py-4 bg-white/5 border-t border-white/5">
        {{ $logs->links() }}
    </div>
    @endif
</div>
@endsection
