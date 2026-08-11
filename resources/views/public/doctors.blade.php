@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center max-w-3xl mx-auto">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Our Specialists</p>
        <h1 class="text-4xl font-bold mt-3">Meet the doctors caring for our community.</h1>
    </div>
    <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($doctors as $doctor)
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <img src="{{ $doctor->image_url ?? 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $doctor->name }}" class="h-56 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-xl">{{ $doctor->name }}</h3>
                    <p class="text-cyan-600 mt-1">{{ $doctor->designation }}</p>
                    <p class="mt-4 text-sm text-slate-600">{{ $doctor->short_bio }}</p>
                    <div class="mt-4 flex flex-wrap gap-2 text-sm">
                        @if($doctor->x_url)<a href="{{ $doctor->x_url }}" class="text-cyan-600">X</a>@endif
                        @if($doctor->facebook_url)<a href="{{ $doctor->facebook_url }}" class="text-cyan-600">Facebook</a>@endif
                        @if($doctor->linkedin_url)<a href="{{ $doctor->linkedin_url }}" class="text-cyan-600">LinkedIn</a>@endif
                    </div>
                </div>
            </div>
        @empty
            <div class="md:col-span-3 text-center text-slate-500">No active doctors are available right now.</div>
        @endforelse
    </div>
</div>
@endsection
