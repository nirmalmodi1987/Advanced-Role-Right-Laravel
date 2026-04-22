@extends('role-right::layout', ['title' => 'Create Role'])

@section('content')
<header class="mb-10">
    <a href="{{ route('role-right.roles.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 flex items-center mb-4 transition-all">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Roles
    </a>
    <h2 class="text-3xl font-bold text-white">Create New Role</h2>
    <p class="text-slate-400 mt-1">Specify a unique name and description for the new access level.</p>
</header>

<div class="max-w-2xl">
    <div class="glass-card p-8">
        <form action="{{ route('role-right.roles.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Role Name</label>
                <input type="text" name="name" id="name" placeholder="e.g. Content Manager" 
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-all @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-500 mt-2">The slug will be generated automatically (e.g. "content-manager").</p>
            </div>

            <div class="mb-8">
                <label for="description" class="block text-sm font-semibold text-slate-300 mb-2">Description (Optional)</label>
                <textarea name="description" id="description" rows="4" placeholder="Briefly describe the purpose of this role..."
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-all">{{ old('description') }}</textarea>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('role-right.roles.index') }}" class="px-6 py-2.5 rounded-xl border border-white/10 text-slate-400 hover:text-white hover:bg-white/5 transition-all text-sm font-medium">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-2.5 rounded-xl accent-gradient text-white shadow-lg shadow-indigo-500/20 text-sm font-bold hover:scale-[1.02] active:scale-[0.98] transition-all">
                    Create Role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
