@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Doctor Management</p>
            <h1 class="text-3xl font-bold mt-2">Manage doctors</h1>
        </div>
        <a href="{{ route('admin.doctors.create') }}" class="rounded-full bg-cyan-600 text-white px-5 py-3">Add Doctor</a>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Designation</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-3">{{ $doctor->name }}</td>
                        <td class="px-4 py-3">{{ $doctor->designation }}</td>
                        <td class="px-4 py-3"><span class="capitalize">{{ $doctor->status }}</span></td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('admin.doctors.edit', $doctor) }}" class="text-cyan-600">Edit</a>
                            <form method="POST" action="{{ route('admin.doctors.destroy', $doctor) }}" onsubmit="return confirm('Delete this doctor?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
