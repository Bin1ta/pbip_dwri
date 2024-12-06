<?php

namespace App\Exports;

use App\Enums\ProjectTypeEnum;
use App\Models\CurrentContract;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\FromCollection;

class CurrentContractsPragannaPdf
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function CurrentContractsPragannaPdf()
    {
        $currentContracts = CurrentContract::where('place_id', ProjectTypeEnum::PRAGANNA->value)->latest()->get();

        $pdf = Pdf::loadView('frontend.exports.currentContractPragannaPdf', compact('currentContracts'));
        $randomFileName = 'contracts_Praganna' . uniqid() . '.pdf';
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($randomFileName);


    }
}
