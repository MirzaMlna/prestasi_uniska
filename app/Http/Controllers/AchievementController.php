<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Cek role pengguna
        if (Auth::user()->role === 'mahasiswa') {
            // Jika role student, tampilkan hanya prestasi yang dimiliki oleh student tersebut
            $query = Achievement::where('student_id', Auth::id());
            $verifiedCount = Achievement::where('student_id', Auth::id())->where('status', 'diterima')->count();
            $pendingCount = Achievement::where('student_id', Auth::id())->where('status', 'tunda')->count();
            $rejectedCount = Achievement::where('student_id', Auth::id())->where('status', 'ditolak')->count();
        } else {
            // Jika role admin, tampilkan semua prestasi
            $query = Achievement::query();
            $verifiedCount = Achievement::where('status', 'diterima')->count();
            $pendingCount = Achievement::where('status', 'tunda')->count();
            $rejectedCount = Achievement::where('status', 'ditolak')->count();
        }

        // Filter berdasarkan status jika ada
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('filter')) {
            $filters = $request->filter;

            if (!empty($filters['nim'])) {
                $query->where('nim', 'like', '%' . $filters['nim'] . '%');
            }

            if (!empty($filters['name'])) {
                $query->where('name', 'like', '%' . $filters['name'] . '%');
            }

            if (!empty($filters['study_program'])) {
                $query->where('study_program', 'like', '%' . $filters['study_program'] . '%');
            }

            if (!empty($filters['achievement_type'])) {
                $query->where('achievement_type', $filters['achievement_type']);
            }

            if (!empty($filters['achievement_level'])) {
                $query->where('achievement_level', '=', $filters['achievement_level']);
            }

            if (!empty($filters['achievement_title'])) {
                $query->where('achievement_title', 'like', '%' . $filters['achievement_title'] . '%');
            }

            if (!empty($filters['start_year'])) {
                $query->whereYear('start_date', '=', $filters['start_year']);
            }

            if (!empty($filters['status'])) {
                $query->where('status', $filters['status']);
            }
        }

        $achievements = $query->paginate(10);

        // Kirim semua variabel ke view
        return view('achievement.index', compact('achievements', 'verifiedCount', 'pendingCount', 'rejectedCount'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'achievement_type' => 'required|string',
            'achievement_level' => 'required|string',
            'participation_type' => 'required|string',
            'execution_model' => 'required|string',
            'event_name' => 'required|string|max:255',
            'participant_count' => 'required|integer|min:1',
            'achievement_title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'news_link' => 'nullable|url',
            'certificate_file' => 'nullable|file|mimes:pdf|max:5120',
            'award_photo_file' => 'nullable|file|mimes:pdf|max:5120',
            'student_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'supervisor_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // Tambahkan student_id dari user yang login
        $validatedData['student_id'] = auth()->id();

        // Upload file ke storage/app/public/
        if ($request->hasFile('certificate_file')) {
            $validatedData['certificate_file'] = $request->file('certificate_file')->store('certificates', 'public');
        }
        if ($request->hasFile('award_photo_file')) {
            $validatedData['award_photo_file'] = $request->file('award_photo_file')->store('awards', 'public');
        }
        if ($request->hasFile('student_assignment_letter')) {
            $validatedData['student_assignment_letter'] = $request->file('student_assignment_letter')->store('assignment_letters', 'public');
        }
        if ($request->hasFile('supervisor_assignment_letter')) {
            $validatedData['supervisor_assignment_letter'] = $request->file('supervisor_assignment_letter')->store('assignment_letters', 'public');
        }


        // Simpan data ke database
        Achievement::create($validatedData);

        return redirect()->route('achievements.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        try {
            $achievement->delete();
            return redirect()->route('achievements.index')->with('success', 'Data Prestasi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('achievements.index')->with('error', 'Gagal menghapus data prestasi.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);
        $request->validate([
            'status' => 'required|in:tunda,diterima,ditolak',
        ]);
        // Update status
        $achievement->status = $request->status;
        $achievement->save();

        return redirect()->route('achievements.index')->with('success', 'Status prestasi berhasil diperbarui.');
    }

    public function print(Request $request)
    {
        $studyProgram = $request->input('study_program');
        $startYear = $request->input('start_year');

        $achievements = Achievement::query()
            ->when($studyProgram, function ($query, $studyProgram) {
                return $query->where('study_program', $studyProgram);
            })
            ->when($startYear, function ($query, $startYear) {
                return $query->whereYear('start_date', $startYear);
            })
            ->get();

        // Debug data
        dd($achievements, $studyProgram, $startYear);

        return view('achievement.print', compact('achievements', 'studyProgram', 'startYear'));
    }
}
