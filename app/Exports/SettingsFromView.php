<?php

namespace App\Exports;

use App\Models\varias\Setting;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SettingsFromView implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('Exports.Settingsexport', [
            'Settings' => Setting::all()
        ]);
    }
}
