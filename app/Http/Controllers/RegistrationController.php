<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'child_name' => 'required|string|max:255',
            'child_nickname' => 'nullable|string|max:100',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'parent_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'branch' => 'required|string',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ], [
            'child_name.required' => 'Nama lengkap anak wajib diisi.',
            'birth_date.required' => 'Tanggal lahir anak wajib diisi.',
            'parent_name.required' => 'Nama orang tua / wali wajib diisi.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
        ]);

        $registration = Registration::create($validated);

        // Determine destination WA number
        $targetPhone = '62811747472'; // Default Pusat
        if (str_contains(strtolower($request->branch), 'griya') || str_contains(strtolower($request->branch), 'cabang')) {
            $targetPhone = '6282378176209'; // Cabang
        }

        // Clean phone number format for display
        $cleanUserPhone = preg_replace('/[^0-9]/', '', $request->phone);

        $waText = "Halo TPA Robbani, saya ingin melakukan konfirmasi pendaftaran online:\n\n"
            . "*No. Registrasi:* #ROB-" . str_pad($registration->id, 4, '0', STR_PAD_LEFT) . "\n"
            . "*Nama Anak:* {$registration->child_name} (" . ($registration->child_nickname ? $registration->child_nickname : '-') . ")\n"
            . "*Tgl Lahir:* " . date('d/m/Y', strtotime($registration->birth_date)) . "\n"
            . "*Jenis Kelamin:* {$registration->gender}\n"
            . "*Nama Orang Tua:* {$registration->parent_name}\n"
            . "*No. WhatsApp:* {$cleanUserPhone}\n"
            . "*Pilihan Cabang:* {$registration->branch}\n\n"
            . "Mohon info proses selanjutnya dan petunjuk kelengkapan berkas. Terima kasih!";

        $waUrl = "https://wa.me/{$targetPhone}?text=" . urlencode($waText);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran online berhasil dikirim! Silakan klik tombol di bawah untuk terhubung langsung ke WhatsApp TPA Robbani.',
                'registration' => $registration,
                'wa_url' => $waUrl,
            ]);
        }

        return redirect()->back()->with([
            'success_registration' => true,
            'message' => 'Pendaftaran online berhasil dikirim!',
            'wa_url' => $waUrl,
            'reg_id' => 'ROB-' . str_pad($registration->id, 4, '0', STR_PAD_LEFT)
        ]);
    }
}
