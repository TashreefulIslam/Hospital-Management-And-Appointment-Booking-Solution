@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center max-w-3xl mx-auto">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Our Services</p>
        <h1 class="text-4xl font-bold mt-3">Specialized care that grows with your needs.</h1>
    </div>
    <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([['Emergency Care','Round-the-clock urgent medical support'],['General Medicine','Primary care and wellness management'],['Cardiology','Preventive and diagnostic heart care'],['Pediatrics','Care for infants, children and adolescents'],['Neurology','Diagnosis and treatment for nerve disorders'],['Orthopedics','Treatment for bone, joint and spine conditions']] as $service)
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="font-semibold text-xl">{{ $service[0] }}</h3>
                <p class="mt-3 text-slate-600">{{ $service[1] }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
