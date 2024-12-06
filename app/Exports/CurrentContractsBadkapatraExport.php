<?php

namespace App\Exports;

use App\Enums\ProjectTypeEnum;
use App\Models\CurrentContract;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CurrentContractsBadkapatraExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $currentContracts = CurrentContract::where('current_status',1)->where('place_id', ProjectTypeEnum::BADKAPATH->value)->latest()->get();

        return view('frontend.exports.currentContractBadkapatra', compact('currentContracts'));
    }
}
