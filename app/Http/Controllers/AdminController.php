<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'doctors' => Doctor::count(),
            'appointments' => Appointment::count(),
            'pending' => Appointment::where('status', 'pending')->count(),
        ];

        return view('admin.index', compact('stats'));
    }

    public function doctors()
    {
        $doctors = Doctor::latest()->get();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function createDoctor()
    {
        return view('admin.doctors.create');
    }

    public function storeDoctor(Request $request)
    {
        $data = $request->validate([
            'image_url' => ['nullable', 'url'],
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'short_bio' => ['nullable', 'string'],
            'x_url' => ['nullable', 'url'],
            'facebook_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'],
            'status' => ['required', 'in:active,inactive'],
            'availability' => ['nullable'],
        ]);

        $data['availability'] = $this->normalizeAvailability($data['availability'] ?? null);

        Doctor::create($data);

        return redirect('/admin/doctors')->with('success', 'Doctor created successfully.');
    }

    public function editDoctor(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function updateDoctor(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'image_url' => ['nullable', 'url'],
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'short_bio' => ['nullable', 'string'],
            'x_url' => ['nullable', 'url'],
            'facebook_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'],
            'status' => ['required', 'in:active,inactive'],
            'availability' => ['nullable'],
        ]);

        $data['availability'] = $this->normalizeAvailability($data['availability'] ?? null);

        $doctor->update($data);

        return redirect('/admin/doctors')->with('success', 'Doctor updated successfully.');
    }

    public function destroyDoctor(Doctor $doctor)
    {
        $doctor->delete();

        return back()->with('success', 'Doctor deleted successfully.');
    }

    public function users(Request $request)
    {
        $query = $request->input('search');
        $users = User::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%");
        })->latest()->paginate(10);

        return view('admin.users.index', compact('users', 'query'));
    }

    public function showUser(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function destroyUser(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->withErrors(['user' => 'You cannot delete your own account.']);
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function updateRole(Request $request, User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->withErrors(['user' => 'You cannot change your own role.']);
        }

        $data = $request->validate([
            'role' => ['required', 'in:user,admin'],
        ]);

        $user->update($data);

        return back()->with('success', 'User role updated successfully.');
    }

    public function appointments()
    {
        $appointments = Appointment::latest()->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function updateAppointmentStatus(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,approved,declined'],
        ]);

        $appointment->update($data);

        return back()->with('success', 'Appointment status updated.');
    }

    private function normalizeAvailability(mixed $value): array
    {
        if (is_array($value)) {
            return array_values(array_filter(array_map('trim', $value)));
        }

        if (is_string($value)) {
            return array_values(array_filter(array_map('trim', preg_split('/\r\n|\n|\r/', $value) ?: [])));
        }

        return [];
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone,' . $user->id],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function passwordForm()
    {
        return view('admin.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password changed successfully.');
    }
}
