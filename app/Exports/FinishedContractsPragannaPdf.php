<?php

namespace App\Exports;

use App\Enums\ProjectTypeEnum;
use App\Models\FinishedContract;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Concerns\FromCollection;

class FinishedContractsPragannaPdf
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function FinishedContractsPragannaPdf()
    {
        $finishedContracts = FinishedContract::where('contractors_liability_status',1)->where('current_status',1)->where('place_id', ProjectTypeEnum::PRAGANNA->value)->latest()->get();
        $randomFileName = 'finished_Praganna' . uniqid() . '.pdf';
        $pdf = Pdf::loadView('frontend.exports.finishedContractPragannaPdf', compact('finishedContracts'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($randomFileName);
    }
}
