<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BonAchatExport implements FromView, ShouldAutoSize
{

    protected $bons;

    public function __construct($bons)
    {
        $this->bons = $bons;
    }

    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {
        return view('exports.bons_achat', [
            'bons' => $this->bons
        ]);
    }
}
