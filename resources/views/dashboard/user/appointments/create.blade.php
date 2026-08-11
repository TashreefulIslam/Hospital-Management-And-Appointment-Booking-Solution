@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">New Appointment</p>
        <h1 class="text-3xl font-bold mt-2">Book your next visit</h1>
    </div>
    <div class="bg-white rounded-2xl shadow-sm p-8 border border-slate-200">
        <form method="POST" action="{{ route('dashboard.appointments.create') }}" class="space-y-5">
            @csrf
            @if ($errors->any())
                <div class="rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>
            @endif
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium">Doctor</label>
                    <select name="doctor_id" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                        <option value="">Select a doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Appointment Date</label>
                    <input type="date" name="appointment_date" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium">Appointment Time</label>
                    <input type="text" name="appointment_time" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3" placeholder="10:30 AM">
                </div>
                <div>
                    <label class="block text-sm font-medium">Patient Name</label>
                    <input type="text" name="patient_name" value="{{ $user->name }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium">Patient Phone</label>
                    <input type="text" name="patient_phone" value="{{ $user->phone }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium">Patient Email</label>
                    <input type="email" name="patient_email" value="{{ $user->email }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium">Patient Address</label>
                    <input type="text" name="patient_address" value="{{ $user->address }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
                <div>
                    <label class="block text-sm font-medium">Reason for Visit</label>
                    <input type="text" name="reason" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium">Additional Message</label>
                <textarea name="message" rows="4" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></textarea>
            </div>
            <button class="rounded-full bg-cyan-600 text-white px-6 py-3 font-semibold">Submit Appointment</button>
        </form>
    </div>
</div>
@endsection
