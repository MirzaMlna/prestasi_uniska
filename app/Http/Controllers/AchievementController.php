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
            if (!empty($filters['status'])) {
                $query->where('status', $filters['status']);
            }
        }
        $verifiedCount = (clone $query)->where('status', 'diterima')->count();
        $pendingCount = (clone $query)->where('status', 'tunda')->count();
        $rejectedCount = (clone $query)->where('status', 'ditolak')->count();
        $achievements = $query->paginate(10);
        return view('achievement.index', compact('achievements', 'verifiedCount', 'pendingCount', 'rejectedCount'));
    }

    public function create()
    {
        return view('achievement.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'achievement_type' => 'nullable|string',
            'achievement_level' => 'nullable|string',
            'participation_type' => 'nullable|string',
            'program_by' => 'nullable|string',
            'execution_model' => 'nullable|string',
            'event_name' => 'nullable|string|max:255',
            'participant_count' => 'nullable|integer|min:1',
            'university_count' => 'nullable|string',
            'achievement_title' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'news_link' => 'nullable|url',
            'certificate_file' => 'nullable|file|mimes:pdf|max:5120',
            'award_photo_file' => 'nullable|file|mimes:pdf|max:5120',
            'student_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'nidn' => 'nullable|string',
            'supervisor_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
        ]);
        $validatedData['student_id'] = auth()->id();
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
        Achievement::create($validatedData);
        return redirect()->route('achievements.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }
    public function show(string $id) {}

    public function edit(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('achievement.edit', compact('achievement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'achievement_type' => 'nullable|string',
            'achievement_level' => 'nullable|string',
            'participation_type' => 'nullable|string',
            'program_by' => 'nullable|string',
            'execution_model' => 'nullable|string',
            'event_name' => 'nullable|string|max:255',
            'participant_count' => 'nullable|integer|min:1',
            'university_count' => 'nullable|string',
            'achievement_title' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'news_link' => 'nullable|url',
            'certificate_file' => 'nullable|file|mimes:pdf|max:5120',
            'award_photo_file' => 'nullable|file|mimes:pdf|max:5120',
            'student_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'nidn' => 'nullable|string',
            'supervisor_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
        ]);
        $achievement = Achievement::findOrFail($id);

        if ($request->hasFile('certificate_file')) {
            if ($achievement->certificate_file) {
                Storage::disk('public')->delete($achievement->certificate_file);
            }
            $validatedData['certificate_file'] = $request->file('certificate_file')->store('certificates', 'public');
        }

        if ($request->hasFile('award_photo_file')) {
            if ($achievement->award_photo_file) {
                Storage::disk('public')->delete($achievement->award_photo_file);
            }
            $validatedData['award_photo_file'] = $request->file('award_photo_file')->store('awards', 'public');
        }

        if ($request->hasFile('student_assignment_letter')) {
            if ($achievement->student_assignment_letter) {
                Storage::disk('public')->delete($achievement->student_assignment_letter);
            }
            $validatedData['student_assignment_letter'] = $request->file('student_assignment_letter')->store('assignment_letters', 'public');
        }

        if ($request->hasFile('supervisor_assignment_letter')) {
            if ($achievement->supervisor_assignment_letter) {
                Storage::disk('public')->delete($achievement->supervisor_assignment_letter);
            }
            $validatedData['supervisor_assignment_letter'] = $request->file('supervisor_assignment_letter')->store('assignment_letters', 'public');
        }
        $achievement->update($validatedData);
        return redirect()->route('achievements.index')->with('success', 'Prestasi berhasil diperbarui!');
    }
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
}
