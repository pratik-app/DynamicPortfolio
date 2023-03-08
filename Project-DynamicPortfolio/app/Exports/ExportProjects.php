<?php

namespace App\Exports;

use App\Models\Projects;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProjects implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Projects::all();
    }
}
