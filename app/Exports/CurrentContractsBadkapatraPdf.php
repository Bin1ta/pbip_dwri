<?php

namespace App\Exports;

use App\Enums\ProjectTypeEnum;
use App\Models\CurrentContract;
use App\Models\FinishedContract;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CurrentContractsBadkapatraPdf
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function currentContractsBadkapatraPdf()
    {
        $currentContracts = CurrentContract::where('place_id', ProjectTypeEnum::BADKAPATH->value)->latest()->get();
        $randomFileName = 'contracts_badkapatra' . uniqid() . '.pdf';
        $pdf = Pdf::loadView('frontend.exports.currentContractBadkaptraPdf', compact('currentContracts'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($randomFileName);
    }
}
