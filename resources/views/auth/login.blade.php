@extends('layouts.public')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Welcome back</p>
            <h1 class="text-4xl font-bold mt-3">Sign in to your hospital account.</h1>
            <p class="mt-6 text-lg text-slate-600">Access your appointments, doctor information and account settings.</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                @if ($errors->any())
                    <div class="rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>
                @endif
                <div>
                    <label class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" name="password" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <button class="w-full rounded-full bg-cyan-600 text-white px-4 py-3 font-semibold">Login</button>
            </form>
            <p class="mt-4 text-sm text-slate-500">No account yet? <a href="{{ route('register') }}" class="text-cyan-600">Create one</a></p>
        </div>
    </div>
</div>
@endsection
