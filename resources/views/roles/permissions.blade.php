@extends('role-right::layout', ['title' => 'Edit Role Permissions'])

@section('content')
<header class="mb-10">
    <a href="{{ route('role-right.roles.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 flex items-center mb-4 transition-all">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Roles
    </a>
    <div class="flex items-center space-x-3">
        <h2 class="text-3xl font-bold text-white">Permissions Matrix</h2>
        <span class="px-3 py-1 rounded-full bg-indigo-500 text-white text-xs font-bold uppercase tracking-widest">{{ $role->name }}</span>
    </div>
    <p class="text-slate-400 mt-1">Select the specific rights you want to grant to the <strong>{{ $role->name }}</strong> role.</p>
</header>

<form action="{{ route('role-right.roles.permissions.update', $role) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 gap-8">
        @foreach($permissions as $group => $groupPermissions)
        <div class="glass-card overflow-hidden">
            <div class="px-6 py-4 bg-white/5 border-b border-white/5 flex justify-between items-center">
                <h3 class="text-sm font-bold uppercase tracking-widest text-indigo-400">{{ $group }}</h3>
                <label class="flex items-center cursor-pointer">
                    <span class="text-xs text-slate-500 mr-2">Select All</span>
                    <input type="checkbox" class="rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 group-select-all" data-group="{{ $group }}">
                </label>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($groupPermissions as $permission)
                <label class="relative flex items-start p-4 rounded-xl border border-white/5 hover:bg-white/5 transition-all cursor-pointer group">
                    <div class="flex items-center h-5">
                        <input name="permissions[]" value="{{ $permission->id }}" type="checkbox" 
                            class="w-5 h-5 rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 transition-all permission-checkbox" 
                            data-group="{{ $group }}"
                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                    </div>
                    <div class="ml-3 text-sm">
                        <span class="font-medium text-slate-200 group-hover:text-white transition-colors">{{ $permission->name }}</span>
                        <p class="text-xs text-slate-500 mt-0.5">{{ $permission->slug }}</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <div class="sticky bottom-8 mt-10 flex justify-end">
        <div class="glass-card p-4 flex items-center space-x-4 shadow-2xl shadow-black/50 border-white/20">
            <span class="text-sm text-slate-400">Review your changes carefully before saving.</span>
            <a href="{{ route('role-right.roles.index') }}" class="px-6 py-2.5 rounded-xl border border-white/10 text-slate-400 hover:text-white hover:bg-white/5 transition-all text-sm font-medium">
                Discard
            </a>
            <button type="submit" class="px-8 py-2.5 rounded-xl accent-gradient text-white shadow-lg shadow-indigo-500/20 text-sm font-bold hover:scale-[1.05] active:scale-[0.95] transition-all">
                Save Matrix Configuration
            </button>
        </div>
    </div>
</form>

<script>
    // Simple Select All logic
    document.querySelectorAll('.group-select-all').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const group = this.dataset.group;
            document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`).forEach(cb => {
                cb.checked = this.checked;
            });
        });
    });
</script>
@endsection
