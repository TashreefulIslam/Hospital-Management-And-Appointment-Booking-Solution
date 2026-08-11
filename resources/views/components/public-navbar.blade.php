<nav class="bg-white/90 shadow-sm backdrop-blur sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-cyan-600 flex items-center justify-center text-white font-bold">HM</div>
                <div>
                    <p class="font-semibold text-slate-800">MediCare Hospital</p>
                    <p class="text-xs text-slate-500">Compassionate Care</p>
                </div>
            </a>
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-cyan-600">Home</a>
                <a href="{{ route('about') }}" class="hover:text-cyan-600">About</a>
                <a href="{{ route('services') }}" class="hover:text-cyan-600">Services</a>
                <a href="{{ route('doctors') }}" class="hover:text-cyan-600">Doctors</a>
                <a href="{{ route('contact') }}" class="hover:text-cyan-600">Contact</a>
            </div>
            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="px-4 py-2 rounded-full bg-cyan-600 text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-full border border-slate-200 text-slate-700">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-full bg-cyan-600 text-white">Register</a>
                @endauth
            </div>
            <div class="md:hidden">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="text-slate-700">☰</button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2 text-sm">
            <a href="{{ route('home') }}" class="block">Home</a>
            <a href="{{ route('about') }}" class="block">About</a>
            <a href="{{ route('services') }}" class="block">Services</a>
            <a href="{{ route('doctors') }}" class="block">Doctors</a>
            <a href="{{ route('contact') }}" class="block">Contact</a>
            @auth
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="block text-cyan-600">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block">Login</a>
                <a href="{{ route('register') }}" class="block">Register</a>
            @endauth
        </div>
    </div>
</nav>
