<?php

namespace App\Exports;

use App\Models\ContractProgress;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ContractProgressExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $contractProgresses = ContractProgress::where('progress_status', 1)->latest()->get();

        return view('frontend.exports.contractProgressExcel', compact('contractProgresses'));
    }
}
