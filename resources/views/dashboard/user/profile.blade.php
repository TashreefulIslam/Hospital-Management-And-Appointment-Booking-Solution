@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-sm p-8 border border-slate-200">
    <div class="mb-6">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Edit Profile</p>
        <h1 class="text-3xl font-bold mt-2">Update your personal information</h1>
    </div>
    <form method="POST" action="{{ route('dashboard.profile') }}" class="space-y-4">
        @csrf
        @if (session('success'))
            <div class="rounded-lg bg-green-50 p-3 text-sm text-green-700">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>
        @endif
        <div>
            <label class="block text-sm font-medium">Name</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <div>
            <label class="block text-sm font-medium">Phone</label>
            <input type="text" name="phone" value="{{ auth()->user()->phone }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <div>
            <label class="block text-sm font-medium">Address</label>
            <input type="text" name="address" value="{{ auth()->user()->address }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <button class="rounded-full bg-cyan-600 text-white px-6 py-3 font-semibold">Save Profile</button>
    </form>
</div>
@endsection
