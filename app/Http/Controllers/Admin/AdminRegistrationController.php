<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('branch')) {
            $query->where('branch', 'like', '%' . $request->branch . '%');
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('child_name', 'like', "%{$search}%")
                  ->orWhere('parent_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $registrations = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.registrations.index', compact('registrations'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $request->validate([
            'status' => 'required|string|in:Menunggu Konfirmasi,Dikonfirmasi,Ditolak',
        ]);

        $registration->update(['status' => $request->status]);

        return redirect()->back()->with('success', "Status pendaftaran #ROB-" . str_pad($registration->id, 4, '0', STR_PAD_LEFT) . " berhasil diubah menjadi {$request->status}.");
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->back()->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
