@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-cyan-600 to-sky-500 rounded-3xl p-8 text-white">
        <p class="text-cyan-100 uppercase tracking-[0.3em] text-sm">Patient Dashboard</p>
        <h1 class="text-3xl font-bold mt-2">Welcome back, {{ $user->name }}.</h1>
        <p class="mt-3 text-cyan-50">Manage appointments, doctor visits, and your profile from here.</p>
    </div>

    <div class="grid md:grid-cols-4 gap-4">
        @foreach([
            ['Total Appointments', $stats['total']],
            ['Pending', $stats['pending']],
            ['Approved', $stats['approved']],
            ['Declined', $stats['declined']],
        ] as $stat)
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
                <p class="text-sm text-slate-500">{{ $stat[0] }}</p>
                <p class="text-2xl font-semibold mt-2">{{ $stat[1] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid lg:grid-cols-[2fr,1fr] gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-xl font-semibold">Latest Appointment</h2>
            @if($latestAppointment)
                <div class="mt-4 space-y-2 text-sm text-slate-600">
                    <p><strong>Doctor:</strong> {{ $latestAppointment->doctor->name }}</p>
                    <p><strong>Date:</strong> {{ $latestAppointment->appointment_date }}</p>
                    <p><strong>Time:</strong> {{ $latestAppointment->appointment_time }}</p>
                    <p><strong>Status:</strong> <span class="capitalize">{{ $latestAppointment->status }}</span></p>
                </div>
            @else
                <p class="mt-4 text-slate-500">No appointment yet.</p>
            @endif
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-xl font-semibold">Quick Actions</h2>
            <div class="mt-4 space-y-3">
                <a href="{{ route('dashboard.appointments.create') }}" class="block w-full rounded-xl bg-cyan-600 text-white px-4 py-3 text-center">Book New Appointment</a>
                <a href="{{ route('dashboard.doctors') }}" class="block w-full rounded-xl border border-slate-200 px-4 py-3 text-center">View Doctors</a>
                <a href="{{ route('dashboard.appointments.history') }}" class="block w-full rounded-xl border border-slate-200 px-4 py-3 text-center">View Appointment History</a>
            </div>
        </div>
    </div>
</div>
@endsection
