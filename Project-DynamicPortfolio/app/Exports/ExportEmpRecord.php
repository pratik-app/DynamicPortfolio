<?php

namespace App\Exports;

use App\Models\ASC\EmpRecord;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportEmpRecord implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmpRecord::all();
    }
}
