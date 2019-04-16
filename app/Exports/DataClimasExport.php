<?php

namespace App\Exports;

use App\DataClima;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataClimasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataClima::all();
    }
}
