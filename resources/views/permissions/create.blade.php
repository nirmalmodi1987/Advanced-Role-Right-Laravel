@extends('role-right::layout', ['title' => 'Add Permission'])

@section('content')
<header class="mb-10">
    <a href="{{ route('role-right.permissions.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 flex items-center mb-4 transition-all">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Registry
    </a>
    <h2 class="text-3xl font-bold text-white">Add New Permission</h2>
    <p class="text-slate-400 mt-1">Create a granular right that can be assigned to roles or users.</p>
</header>

<div class="max-w-2xl">
    <div class="glass-card p-8">
        <form action="{{ route('role-right.permissions.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Permission Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Delete Posts" 
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-all @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="group" class="block text-sm font-semibold text-slate-300 mb-2">Group / Module</label>
                    <input type="text" name="group" id="group" placeholder="e.g. Blog" 
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-all @error('group') border-red-500 @enderror"
                        value="{{ old('group') }}" required>
                    @error('group')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-8">
                <label for="description" class="block text-sm font-semibold text-slate-300 mb-2">Description (Optional)</label>
                <textarea name="description" id="description" rows="4" placeholder="What does this permission allow the user to do?"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-all">{{ old('description') }}</textarea>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('role-right.permissions.index') }}" class="px-6 py-2.5 rounded-xl border border-white/10 text-slate-400 hover:text-white hover:bg-white/5 transition-all text-sm font-medium">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-2.5 rounded-xl accent-gradient text-white shadow-lg shadow-indigo-500/20 text-sm font-bold hover:scale-[1.02] active:scale-[0.98] transition-all">
                    Register Permission
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
