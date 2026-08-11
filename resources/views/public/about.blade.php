@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-3xl">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">About MediCare Hospital</p>
        <h1 class="text-4xl font-bold mt-3">A modern hospital built around patient wellbeing.</h1>
        <p class="mt-6 text-lg text-slate-600 leading-8">We provide trusted medical solutions with a focus on personalized care, preventative medicine, and compassionate support.</p>
    </div>
    <div class="mt-12 grid md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm"><h3 class="font-semibold text-xl">Our History</h3><p class="mt-3 text-slate-600">Established to transform hospital care with advanced systems and a patient-first culture.</p></div>
        <div class="bg-white p-6 rounded-2xl shadow-sm"><h3 class="font-semibold text-xl">Our Values</h3><p class="mt-3 text-slate-600">Integrity, innovation, respect, and accountability guide every interaction and decision.</p></div>
        <div class="bg-white p-6 rounded-2xl shadow-sm"><h3 class="font-semibold text-xl">Our Promise</h3><p class="mt-3 text-slate-600">Every patient receives attentive, evidence-based, and compassionate care from diagnosis to recovery.</p></div>
    </div>
</div>
@endsection
