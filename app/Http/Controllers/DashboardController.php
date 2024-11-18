<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            // Data untuk admin
            $totalAlumni = User::where('role', 'alumni')->count();
            $totalEvents = Event::count();
            $recentEvents = Event::latest()->take(5)->get();
            $recentAttendances = Attendance::with(['user', 'event'])
                ->latest()
                ->take(5)
                ->get();

            return view('admin.dashboard.admin', compact(
                'totalAlumni',
                'totalEvents',
                'recentEvents',
                'recentAttendances'
            ));
        } else {
            // Data untuk alumni
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
