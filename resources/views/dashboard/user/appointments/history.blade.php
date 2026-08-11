@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div>
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Appointment History</p>
        <h1 class="text-3xl font-bold mt-2">All your visits</h1>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left">
                <tr>
                    <th class="px-4 py-3">Doctor</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Time</th>
                    <th class="px-4 py-3">Reason</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $appointment->doctor->name }}</td>
                        <td class="px-4 py-3">{{ $appointment->appointment_date }}</td>
                        <td class="px-4 py-3">{{ $appointment->appointment_time }}</td>
                        <td class="px-4 py-3">{{ $appointment->reason }}</td>
                        <td class="px-4 py-3"><span class="capitalize rounded-full bg-slate-100 px-3 py-1">{{ $appointment->status }}</span></td>
                        <td class="px-4 py-3">{{ $appointment->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-6 text-slate-500">No appointments found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
