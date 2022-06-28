<?php

namespace App\Imports;
#inport auth and use it
use Illuminate\Support\Facades\Auth;

use App\Models\ExcelTva;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportExcel implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExcelTva([
            'user_id' => Auth::id(),
            'col1' => $row["col1"],
            'col2' => $row["col2"],
            'col3' => $row["col3"],
        ]);
    }
}

