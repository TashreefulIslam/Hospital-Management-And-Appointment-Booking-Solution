@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-cyan-700 to-sky-500 rounded-3xl p-8 text-white">
        <p class="text-cyan-100 uppercase tracking-[0.3em] text-sm">Admin Dashboard</p>
        <h1 class="text-3xl font-bold mt-2">Welcome back, {{ auth()->user()->name }}.</h1>
    </div>
    <div class="grid md:grid-cols-4 gap-4">
        @foreach([
            ['Total Users', $stats['users']],
            ['Total Doctors', $stats['doctors']],
            ['Total Appointments', $stats['appointments']],
            ['Pending Appointments', $stats['pending']],
        ] as $stat)
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">{{ $stat[0] }}</p>
                <p class="text-2xl font-semibold mt-2">{{ $stat[1] }}</p>
            </div>
        @endforeach
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.doctors.create') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">Add Doctor</a>
        <a href="{{ route('admin.doctors') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">View Doctors</a>
        <a href="{{ route('admin.users') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">View Users</a>
        <a href="{{ route('admin.appointments') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">Manage Appointments</a>
    </div>
</div>
@endsection
