@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Doctor Directory</p>
            <h1 class="text-3xl font-bold mt-2">Available doctors</h1>
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-6">
        @forelse($doctors as $doctor)
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-200">
                <img src="{{ $doctor->image_url ?? 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $doctor->name }}" class="h-56 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-xl">{{ $doctor->name }}</h3>
                    <p class="text-cyan-600 mt-1">{{ $doctor->designation }}</p>
                    <p class="mt-4 text-sm text-slate-600">{{ $doctor->short_bio }}</p>
                    <div class="mt-4">
                        <p class="font-medium text-slate-700">Availability</p>
                        <ul class="mt-2 text-sm text-slate-600 space-y-1">
                            @foreach($doctor->availability ?? [] as $slot)
                                <li>• {{ $slot }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <div class="md:col-span-2 text-slate-500">No active doctors available.</div>
        @endforelse
    </div>
</div>
@endsection
