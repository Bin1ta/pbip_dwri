<?php

namespace App\Exports;

use App\Enums\ProjectTypeEnum;
use App\Models\FinishedContract;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FinishedContractsPragannaExport implements FromView

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $finishedContracts = FinishedContract::where('place_id', ProjectTypeEnum::PRAGANNA->value)->latest()->get();

        return view('frontend.exports.finishedContracts', compact('finishedContracts'));
    }
}
