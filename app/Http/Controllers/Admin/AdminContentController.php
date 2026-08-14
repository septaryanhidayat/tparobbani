<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Facility;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    // Activities CRUD
    public function activities()
    {
        $activities = Activity::orderBy('order', 'asc')->get();
        return view('admin.activities.index', compact('activities'));
    }

    public function storeActivity(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'color' => 'nullable|string',
        ]);

        $validated['order'] = Activity::count() + 1;
        Activity::create($validated);

        return redirect()->back()->with('success', 'Kegiatan baru berhasil ditambahkan!');
    }

    public function updateActivity(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'color' => 'nullable|string',
        ]);

        $activity->update($validated);
        return redirect()->back()->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroyActivity(Activity $activity)
    {
        $activity->delete();
        return redirect()->back()->with('success', 'Kegiatan berhasil dihapus.');
    }

    // Facilities CRUD
    public function facilities()
    {
        $facilities = Facility::orderBy('order', 'asc')->get();
        return view('admin.facilities.index', compact('facilities'));
    }

    public function storeFacility(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'tag' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = 'facility-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $filename);
            $validated['image'] = 'images/' . $filename;
        } else {
            $validated['image'] = 'images/play-area.png';
        }

        $validated['order'] = Facility::count() + 1;
        Facility::create($validated);

        return redirect()->back()->with('success', 'Fasilitas baru berhasil ditambahkan!');
    }

    public function updateFacility(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'tag' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = 'facility-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $filename);
            $validated['image'] = 'images/' . $filename;
        }

        $facility->update($validated);
        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function destroyFacility(Facility $facility)
    {
        $facility->delete();
        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }
}
