<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Registration;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_registrations' => Registration::count(),
            'pending_registrations' => Registration::where('status', 'Menunggu Konfirmasi')->count(),
            'confirmed_registrations' => Registration::where('status', 'Dikonfirmasi')->count(),
            'activities_count' => Activity::count(),
            'facilities_count' => Facility::count(),
            'faqs_count' => Faq::count(),
        ];

        $recentRegistrations = Registration::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentRegistrations'));
    }
}
