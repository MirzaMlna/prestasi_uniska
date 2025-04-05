<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role === 'mahasiswa') {
            $query = Achievement::where('student_id', Auth::id());
        } else {
            $query = Achievement::query();
            $query->whereNotNull('achievement_type')
                ->whereNotNull('achievement_level')
                ->whereNotNull('participation_type')
                ->whereNotNull('program_by')
                ->whereNotNull('execution_model')
                ->whereNotNull('event_name')
                ->whereNotNull('participant_count')
                ->whereNotNull('university_count')
                ->whereNotNull('achievement_title')
                ->whereNotNull('start_date')
                ->whereNotNull('end_date')
                ->whereNotNull('nidn');
        }
        $verifiedCount = (clone $query)->where('status', 'diterima')->count();
        $pendingCount = (clone $query)->where('status', 'tunda')->count();
        $rejectedCount = (clone $query)->where('status', 'ditolak')->count();

        return view('dashboard', compact('user', 'verifiedCount', 'pendingCount', 'rejectedCount'));
    }
}
