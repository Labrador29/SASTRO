<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Bidang;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $totalPengurus = User::where('role', 'pengurus_aktif')->count();
            $totalPengguna = User::count();
            $totalBidang = Bidang::count();
            $totalEvents = Event::count();
            $recentEvents = Event::latest()->take(5)->get();
            $recentAttendances = Attendance::with(['user', 'event'])
                ->latest()
                ->take(5)
                ->get();

            return view('admin.dashboard.admin', ['title' => 'Admin | Dashboard'], compact(
                'totalPengurus',
                'totalPengguna',
                'totalBidang',
                'totalEvents',
                'recentEvents',
                'recentAttendances'
            ));
        } else {
            $myAttendances = Attendance::where('user_id', auth()->id())
                ->with('event')
                ->latest()
                ->get();
            $upcomingEvents = Event::where('event_date', '>=', now())
                ->orderBy('event_date')
                ->take(5)
                ->get();

            return view('admin.dashboard.alumni', compact('myAttendances', 'upcomingEvents'));
        }
    }

    public function admin()
    {
        return view('admin.dashboard.index');
    }
}
