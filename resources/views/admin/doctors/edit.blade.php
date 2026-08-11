@extends('layouts.admin')

@section('content')
<div class="max-w-4xl bg-white rounded-2xl shadow-sm p-8 border border-slate-200">
    <div class="mb-6">
        <p class="text-cyan-600 font-semibold uppercase tracking-[0.3em] text-sm">Edit Doctor</p>
        <h1 class="text-3xl font-bold mt-2">Update doctor profile</h1>
    </div>
    <form method="POST" action="{{ route('admin.doctors.update', $doctor) }}" class="space-y-4">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="rounded-lg bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>
        @endif
        <div class="grid md:grid-cols-2 gap-4">
            <div><label class="block text-sm font-medium">Image URL</label><input type="url" name="image_url" value="{{ old('image_url', $doctor->image_url) }}" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></div>
            <div><label class="block text-sm font-medium">Name</label><input type="text" name="name" value="{{ old('name', $doctor->name) }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></div>
            <div><label class="block text-sm font-medium">Designation</label><input type="text" name="designation" value="{{ old('designation', $doctor->designation) }}" required class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></div>
            <div><label class="block text-sm font-medium">Status</label><select name="status" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"><option value="active" @selected($doctor->status === 'active')>active</option><option value="inactive" @selected($doctor->status === 'inactive')>inactive</option></select></div>
        </div>
        <div><label class="block text-sm font-medium">Short Bio</label><textarea name="short_bio" rows="3" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">{{ old('short_bio', $doctor->short_bio) }}</textarea></div>
        <div class="grid md:grid-cols-3 gap-4">
            <div><label class="block text-sm font-medium">X/Twitter</label><input type="url" name="x_url" value="{{ old('x_url', $doctor->x_url) }}" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></div>
            <div><label class="block text-sm font-medium">Facebook</label><input type="url" name="facebook_url" value="{{ old('facebook_url', $doctor->facebook_url) }}" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></div>
            <div><label class="block text-sm font-medium">LinkedIn</label><input type="url" name="linkedin_url" value="{{ old('linkedin_url', $doctor->linkedin_url) }}" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3"></div>
        </div>
        <div><label class="block text-sm font-medium">Availability Schedule</label><textarea name="availability" rows="4" class="mt-1 w-full border border-slate-200 rounded-xl px-4 py-3">{{ old('availability', is_array($doctor->availability) ? implode("\n", $doctor->availability) : '') }}</textarea></div>
        <button class="rounded-full bg-cyan-600 text-white px-6 py-3 font-semibold">Update Doctor</button>
    </form>
</div>
@endsection
