<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | MediCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800">
<div class="min-h-screen flex">
    <aside class="w-72 bg-slate-900 text-slate-100 hidden lg:flex flex-col p-6">
        <div class="flex items-center gap-3 mb-10">
            <div class="h-10 w-10 rounded-full bg-cyan-600 flex items-center justify-center font-bold">HM</div>
            <div>
                <p class="font-semibold">MediCare</p>
                <p class="text-xs text-slate-400">Patient Portal</p>
            </div>
        </div>
        <nav class="space-y-2 text-sm">
            <a href="{{ route('dashboard') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800">Dashboard</a>
            <a href="{{ route('dashboard.doctors') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800">Check Doctors</a>
            <a href="{{ route('dashboard.appointments.create') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800">New Appointment</a>
            <a href="{{ route('dashboard.appointments.history') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800">Appointment History</a>
            <a href="{{ route('dashboard.profile') }}" class="block rounded-xl px-4 py-3 hover:bg-slate-800">Edit Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left rounded-xl px-4 py-3 hover:bg-slate-800">Logout</button>
            </form>
        </nav>
    </aside>
    <div class="flex-1">
        <header class="bg-white border-b border-slate-200 px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="lg:hidden">
                <a href="{{ route('dashboard') }}" class="font-semibold">MediCare</a>
            </div>
            <p class="font-semibold">Welcome, {{ auth()->user()->name }}</p>
        </header>
        <main class="p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
