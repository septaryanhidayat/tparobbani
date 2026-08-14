<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        $branches = [
            [
                'id' => 'pusat',
                'name' => $settings['pusat_name'] ?? 'TPA Pusat',
                'address' => $settings['pusat_address'] ?? 'Jl Sarjana, Blok C17 Timbangan',
                'phone' => $settings['pusat_phone'] ?? '0811747472',
                'phone_formatted' => $settings['pusat_phone_formatted'] ?? '0811 7474 72',
                'district' => $settings['pusat_district'] ?? 'Kec. Indralaya Utara, Kab. Ogan Ilir, Timbangan',
                'wa_url' => 'https://wa.me/62' . ($settings['pusat_phone'] ?? '0811747472') . '?text=Halo%20TPA%20Robbani%20Pusat,%20saya%20ingin%20bertanya%20mengenai%20pendaftaran%20penitipan%20anak.',
                'maps_url' => 'https://maps.google.com/?q=' . urlencode($settings['pusat_address'] ?? 'Jl Sarjana Blok C17 Timbangan Indralaya Utara'),
                'badge' => 'Kantor Pusat'
            ],
            [
                'id' => 'cabang',
                'name' => $settings['cabang_name'] ?? 'TPA Cabang',
                'address' => $settings['cabang_address'] ?? 'Griya Sejahtera 7 A4 No. 5',
                'phone' => $settings['cabang_phone'] ?? '082378176209',
                'phone_formatted' => $settings['cabang_phone_formatted'] ?? '0823 7817 6209',
                'district' => $settings['cabang_district'] ?? 'Kec. Indralaya Utara, Kab. Ogan Ilir',
                'wa_url' => 'https://wa.me/62' . ($settings['cabang_phone'] ?? '082378176209') . '?text=Halo%20TPA%20Robbani%20Cabang,%20saya%20ingin%20bertanya%20mengenai%20pendaftaran%20penitipan%20anak.',
                'maps_url' => 'https://maps.google.com/?q=' . urlencode($settings['cabang_address'] ?? 'Griya Sejahtera 7 A4 No 5 Indralaya Utara'),
                'badge' => 'Cabang Griya Sejahtera'
            ],
        ];

        $activities = Activity::orderBy('order', 'asc')->get();
        $facilities = Facility::orderBy('order', 'asc')->get();
        $faqs = Faq::orderBy('order', 'asc')->get();

        $requirementsRaw = $settings['requirements_list'] ?? "Membayar uang pendaftaran Rp 200.000,-\nMengisi Formulir dan Surat Pernyataan Orang Tua\nFotokopi Kartu Keluarga (KK) 1 Lembar\nFotokopi Akta Kelahiran Anak 1 Lembar\nFotokopi KTP Orang Tua masing-masing 1 lembar";
        $requirements = array_filter(array_map('trim', explode("\n", $requirementsRaw)));

        return view('home', compact('settings', 'branches', 'activities', 'facilities', 'requirements', 'faqs'));
    }
}
