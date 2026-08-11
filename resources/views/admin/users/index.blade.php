@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div>
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">User Management</p>
        <h1 class="text-3xl font-bold mt-2">Manage registered users</h1>
    </div>
    <form method="GET" action="{{ route('admin.users') }}" class="flex gap-3">
        <input type="text" name="search" value="{{ $query ?? '' }}" placeholder="Search users" class="w-full border border-slate-200 rounded-xl px-4 py-3">
        <button class="rounded-full bg-cyan-600 text-white px-5 py-3">Search</button>
    </form>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">{{ $user->role }}</td>
                        <td class="px-4 py-3 flex gap-3">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-cyan-600">View</a>
                            <form method="POST" action="{{ route('admin.users.role', $user) }}">
                                @csrf
                                <input type="hidden" name="role" value="{{ $user->role === 'admin' ? 'user' : 'admin' }}">
                                <button class="text-amber-600">{{ $user->role === 'admin' ? 'Demote' : 'Promote' }}</button>
                            </form>
                            @if(auth()->id() !== $user->id)
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
@endsection
