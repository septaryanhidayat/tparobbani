<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = [
            'site_name',
            'site_tagline',
            'announcement_badge',
            'announcement_text',
            'hero_badge',
            'hero_title',
            'hero_subtitle',
            'registration_fee',
            'requirements_list',
            'pusat_name',
            'pusat_address',
            'pusat_district',
            'pusat_phone',
            'pusat_phone_formatted',
            'cabang_name',
            'cabang_address',
            'cabang_district',
            'cabang_phone',
            'cabang_phone_formatted',
            'operational_hours',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field));
            }
        }

        // Handle Image Uploads (Hero image or logo)
        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            if ($file->isValid()) {
                $filename = 'hero-kids-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $filename);
                Setting::set('hero_image', 'images/' . $filename);
            }
        }

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            if ($file->isValid()) {
                $file->move(public_path('images'), 'logo.png');
                @copy(public_path('images/logo.png'), public_path('images/og-image.png'));
                Setting::set('logo_image', 'images/logo.png');
            }
        }

        return redirect()->back()->with('success', 'Pengaturan website & konten berhasil diperbarui!');
    }
}
