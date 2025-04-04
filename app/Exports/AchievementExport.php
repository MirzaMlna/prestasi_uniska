<?php

namespace App\Exports;

use App\Models\Achievement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AchievementExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Achievement::all();
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'No. HP',
            'Program Studi',
            'Jenis Prestasi',
            'Diselenggarakan Oleh',
            'Tingkat',
            'Jenis Partisipasi',
            'Model Pelaksanaan',
            'Nama Kegiatan',
            'Jumlah Peserta',
            'Jumlah PT',
            'Judul Prestasi',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Link Berita',
            'File Sertifikat',
            'Foto Penghargaan',
            'Surat Tugas Mahasiswa',
            'NIDN Dosen',
            'Surat Tugas Dosen',
            'Status',
        ];
    }

    public function map($a): array
    {
        return [
            $a->nim,
            $a->name,
            $a->phone,
            $a->study_program,
            $a->achievement_type,
            $a->program_by,
            $a->achievement_level,
            $a->participation_type,
            $a->execution_model,
            $a->event_name,
            $a->participant_count,
            $a->university_count,
            $a->achievement_title,
            $a->start_date,
            $a->end_date,
            $a->news_link,
            $a->certificate_file ? url('storage/' . $a->certificate_file) : 'Tidak ada',
            $a->award_photo_file ? url('storage/' . $a->award_photo_file) : 'Tidak ada',
            $a->student_assignment_letter ? url('storage/' . $a->student_assignment_letter) : 'Tidak ada',
            $a->nidn,
            $a->supervisor_assignment_letter ? url('storage/' . $a->supervisor_assignment_letter) : 'Tidak ada',
            $a->status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Baris pertama (heading) dibuat bold
        ];
    }
}
