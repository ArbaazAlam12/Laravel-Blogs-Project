<?php

namespace App\Exports;

use App\Models\posts;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // This function retrieves all posts from the database and returns them.
    public function collection()
    {
        return posts::all();
    }
}
