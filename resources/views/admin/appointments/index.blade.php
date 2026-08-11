@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div>
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Appointment Management</p>
        <h1 class="text-3xl font-bold mt-2">Manage appointment requests</h1>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left">
                <tr>
                    <th class="px-4 py-3">Patient</th>
                    <th class="px-4 py-3">Contact</th>
                    <th class="px-4 py-3">Doctor</th>
                    <th class="px-4 py-3">Date/Time</th>
                    <th class="px-4 py-3">Reason</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $appointment->patient_name }}</td>
                        <td class="px-4 py-3">{{ $appointment->patient_phone }}<br>{{ $appointment->patient_email }}</td>
                        <td class="px-4 py-3">{{ $appointment->doctor->name }}</td>
                        <td class="px-4 py-3">{{ $appointment->appointment_date }}<br>{{ $appointment->appointment_time }}</td>
                        <td class="px-4 py-3">{{ $appointment->reason }}</td>
                        <td class="px-4 py-3">{{ $appointment->status }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.appointments.status', $appointment) }}" class="flex gap-2">
                                @csrf
                                <select name="status" class="border border-slate-200 rounded-lg px-2 py-1">
                                    <option value="pending" @selected($appointment->status === 'pending')>pending</option>
                                    <option value="approved" @selected($appointment->status === 'approved')>approved</option>
                                    <option value="declined" @selected($appointment->status === 'declined')>declined</option>
                                </select>
                                <button class="text-cyan-600">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
