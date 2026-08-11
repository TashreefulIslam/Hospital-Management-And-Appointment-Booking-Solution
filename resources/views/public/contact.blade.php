@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid lg:grid-cols-2 gap-10">
        <div>
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Contact Us</p>
            <h1 class="text-4xl font-bold mt-3">We’re here to help with your care journey.</h1>
            <p class="mt-6 text-lg text-slate-600 leading-8">Reach out for appointments, medical guidance, or general inquiries and our team will assist you.</p>
            <div class="mt-8 space-y-3 text-slate-600">
                <p><strong>Phone:</strong> +880 1700-000000</p>
                <p><strong>Email:</strong> info@medicare.example</p>
                <p><strong>Address:</strong> 45 Medical Avenue, Dhaka</p>
            </div>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm">
            <h2 class="text-2xl font-semibold">Send a message</h2>
            <div class="mt-6 space-y-4">
                <input class="w-full border border-slate-200 rounded-xl px-4 py-3" placeholder="Your name">
                <input class="w-full border border-slate-200 rounded-xl px-4 py-3" placeholder="Your email">
                <textarea class="w-full border border-slate-200 rounded-xl px-4 py-3" rows="4" placeholder="How can we help?"></textarea>
                <button class="px-6 py-3 rounded-full bg-cyan-600 text-white">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
