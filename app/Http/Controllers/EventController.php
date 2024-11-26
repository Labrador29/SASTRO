<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255'
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Acara berhasil dibuat!');
    }

    public function show(Event $event)
    {
        $attendances = $event->attendances()->with('user')->get();
        return view('admin.events.show', compact('event', 'attendances'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Acara berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Acara berhasil dihapus!');
    }
    public function showScanner(Event $event)
    {
        return view('admin.events.scan', compact('event'));
    }

    // public function processAttendance(Request $request)
    // {
    //     // Check user by QR code
    //     $user = User::where('qr_code', $request->qr_code)->first();

    //     if (!$user) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'QR Code tidak valid'
    //         ], 404);
    //     }

    //     // Check if already attended
    //     $exists = Attendance::where('user_id', $user->id)
    //         ->where('event_id', $request->event_id)
    //         ->exists();

    //     if ($exists) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Alumni sudah melakukan absensi'
    //         ]);
    //     }

    //     // Create attendance record
    //     Attendance::create([
    //         'user_id' => $user->id,
    //         'event_id' => $request->event_id,
    //         'attended_at' => now()
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Absensi berhasil',
    //         'user' => [
    //             'name' => $user->name,
    //             'email' => $user->email
    //         ]
    //     ]);
    // }
    public function processAttendance(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string',
            'event_id' => 'required|integer'
        ]);

        $user = User::where('qr_code', $request->qr_code)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'QR Code tidak valid'
            ], 404);
        }

        $exists = Attendance::where('user_id', $user->id)
            ->where('event_id', $request->event_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Tamu sudah terdaftar'
            ]);
        }

        Attendance::create([
            'user_id' => $user->id,
            'event_id' => $request->event_id,
            'attended_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kehadiran berhasil dicatat',
            'user' => [
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }
}
