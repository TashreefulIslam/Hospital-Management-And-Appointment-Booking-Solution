<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $doctors = Doctor::where('status', 'active')->latest()->take(3)->get();

        return view('public.home', compact('doctors'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function services()
    {
        return view('public.services');
    }

    public function doctors()
    {
        $doctors = Doctor::where('status', 'active')->latest()->get();

        return view('public.doctors', compact('doctors'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
