@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-sm p-8 border border-slate-200">
    <div class="mb-6">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Change Password</p>
        <h1 class="text-3xl font-bold mt-2">Secure your account</h1>
    </div>
    <form method="POST" action="{{ route('dashboard.password') }}" class="space-y-4">
        @csrf
        @if (session('success'))
            <div class="rounded-lg bg-green-50 p-3 text-sm text-green-700">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>
        @endif
        <div>
            <label class="block text-sm font-medium">Current Password</label>
            <input type="password" name="current_password" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <div>
            <label class="block text-sm font-medium">New Password</label>
            <input type="password" name="new_password" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <div>
            <label class="block text-sm font-medium">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
        </div>
        <button class="rounded-full bg-cyan-600 text-white px-6 py-3 font-semibold">Update Password</button>
    </form>
</div>
@endsection
