<?php

namespace App\Exports;

use App\Enums\ProjectTypeEnum;
use App\Models\FinishedContract;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FinishedContractsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $finishedContracts = FinishedContract::where('contractors_liability_status',1)->where('current_status',1)->where('place_id', ProjectTypeEnum::BADKAPATH->value)->latest()->get();

        return view('frontend.exports.finishedContracts', compact('finishedContracts'));
    }
}
