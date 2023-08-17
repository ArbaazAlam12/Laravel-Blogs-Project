<?php

namespace App\Imports;

use App\Models\posts;
use Maatwebsite\Excel\Concerns\ToModel;

class PostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // This PHP function imports Excel data into a database, creating new posts with specified title, author, content, tag, and a fixed category 'Personal'.
    public function model(array $row)
    {
        return new posts([
            'title'=>$row['0'],
            'author'=>$row['1'],
            'content'=>$row['2'],
            'tag'=>$row['3'],
            'category'=>'Personal',
        ]);
    }
}
