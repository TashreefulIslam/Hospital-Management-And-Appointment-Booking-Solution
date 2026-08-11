@extends('layouts.admin')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-sm p-8 border border-slate-200">
    <div class="mb-6">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">User Details</p>
        <h1 class="text-3xl font-bold mt-2">{{ $user->name }}</h1>
    </div>
    <div class="space-y-3 text-slate-600">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone }}</p>
        <p><strong>Address:</strong> {{ $user->address }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>
    </div>
</div>
@endsection
