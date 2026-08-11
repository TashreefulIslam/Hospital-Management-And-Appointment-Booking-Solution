@extends('layouts.public')

@section('content')
<section class="bg-gradient-to-br from-cyan-700 via-cyan-600 to-sky-500 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-cyan-100 font-semibold uppercase tracking-[0.3em] text-sm">Trusted Hospital Care</p>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mt-4">Caring for every patient with expertise and compassion.</h1>
            <p class="mt-6 text-lg text-cyan-50 max-w-xl">Experience modern healthcare, advanced diagnostics, and personalized treatment from skilled medical professionals.</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('dashboard.appointments.create') }}" class="px-6 py-3 rounded-full bg-white text-cyan-700 font-semibold">Book an Appointment</a>
                <a href="{{ route('doctors') }}" class="px-6 py-3 rounded-full border border-white/50 text-white">Explore Doctors</a>
            </div>
        </div>
        <div class="bg-white/10 rounded-3xl p-6 backdrop-blur">
            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=900&q=80" alt="Doctor consulting patient" class="h-96 w-full object-cover rounded-2xl">
        </div>
    </div>
</section>

<section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">About Our Hospital</p>
            <h2 class="text-3xl md:text-4xl font-bold mt-3">Committed to excellence in healthcare services.</h2>
            <p class="mt-5 text-lg text-slate-600 leading-8">MediCare Hospital combines advanced technology with a warm, human-centered approach to deliver holistic and reliable care.</p>
        </div>
        <div class="grid sm:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-semibold text-xl">Our Mission</h3>
                <p class="mt-3 text-slate-600">To improve community health by offering accessible, quality and compassionate care.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="font-semibold text-xl">Our Vision</h3>
                <p class="mt-3 text-slate-600">To become a leading healthcare institution known for innovation and patient trust.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm sm:col-span-2">
                <h3 class="font-semibold text-xl">Why Choose Us</h3>
                <p class="mt-3 text-slate-600">Experienced physicians, modern facilities, quick appointments, and a patient-first support team.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Services</p>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">Comprehensive medical care for every stage of life.</h2>
        </div>
        <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach([['Emergency Care','Rapid response and critical treatment'],['General Medicine','Preventive and primary care'],['Cardiology','Heart care and screening'],['Pediatrics','Specialized child healthcare'],['Neurology','Advanced neurological assessment'],['Orthopedics','Joint and bone care']] as $service)
                <div class="p-6 rounded-2xl border border-slate-200 bg-slate-50">
                    <h3 class="font-semibold text-xl">{{ $service[0] }}</h3>
                    <p class="mt-3 text-slate-600">{{ $service[1] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="flex items-end justify-between gap-4">
        <div>
            <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Our Doctors</p>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">Meet our specialist team.</h2>
        </div>
        <a href="{{ route('doctors') }}" class="text-cyan-600 font-semibold">View all</a>
    </div>
    <div class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($doctors as $doctor)
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <img src="{{ $doctor->image_url ?? 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80' }}" alt="{{ $doctor->name }}" class="h-56 w-full object-cover">
                <div class="p-6">
                    <h3 class="font-semibold text-xl">{{ $doctor->name }}</h3>
                    <p class="text-cyan-600 mt-1">{{ $doctor->designation }}</p>
                    <p class="mt-4 text-sm text-slate-600">{{ $doctor->short_bio }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="bg-slate-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <p class="text-cyan-400 font-semibold uppercase tracking-[0.3em] text-sm">Testimonials</p>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">What patients say about us.</h2>
        </div>
        <div class="mt-10 grid md:grid-cols-3 gap-6">
            @foreach([['“The staff was incredibly supportive and the treatment was excellent.”','Sarah M.'],['“The doctors listened carefully and made me feel comfortable.”','James R.'],['“Clean, professional, and truly caring environment.”','Amina K.']] as $testimonial)
                <div class="bg-slate-800 p-6 rounded-2xl">
                    <p class="text-slate-300">{{ $testimonial[0] }}</p>
                    <p class="mt-4 font-semibold">{{ $testimonial[1] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="bg-cyan-600 text-white rounded-3xl p-10 lg:p-14 flex flex-col lg:flex-row justify-between gap-6">
        <div>
            <p class="text-cyan-100 uppercase tracking-[0.3em] text-sm">Ready to visit?</p>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">Book your appointment online in minutes.</h2>
        </div>
        <a href="{{ route('dashboard.appointments.create') }}" class="px-6 py-3 rounded-full bg-white text-cyan-700 font-semibold self-start">Schedule Now</a>
    </div>
</section>
@endsection
