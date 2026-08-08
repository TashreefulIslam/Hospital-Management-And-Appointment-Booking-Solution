<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user();
        $appointments = Appointment::where('user_id', $user->id)->latest()->get();
        $stats = [
            'total' => $appointments->count(),
            'pending' => $appointments->where('status', 'pending')->count(),
            'approved' => $appointments->where('status', 'approved')->count(),
            'declined' => $appointments->where('status', 'declined')->count(),
        ];
        $latestAppointment = $appointments->first();

        return view('dashboard.user.index', compact('user', 'appointments', 'stats', 'latestAppointment'));
    }

    public function userDoctors()
    {
        $doctors = Doctor::where('status', 'active')->latest()->get();

        return view('dashboard.user.doctors', compact('doctors'));
    }

    public function createAppointment()
    {
        $doctors = Doctor::where('status', 'active')->get();
        $user = Auth::user();

        return view('dashboard.user.appointments.create', compact('doctors', 'user'));
    }

    public function storeAppointment(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => ['required', 'exists:doctors,id'],
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required', 'string'],
            'patient_name' => ['required', 'string', 'max:255'],
            'patient_phone' => ['required', 'string', 'max:20'],
            'patient_email' => ['required', 'email'],
            'patient_address' => ['required', 'string', 'max:255'],
            'reason' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        Appointment::create($data);

        return redirect('/dashboard/appointments/history')->with('success', 'Appointment submitted successfully.');
    }

    public function appointmentHistory()
    {
        $appointments = Appointment::where('user_id', Auth::id())->latest()->get();

        return view('dashboard.user.appointments.history', compact('appointments'));
    }

    public function profile()
    {
        return view('dashboard.user.profile');
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
        return view('dashboard.user.password');
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
