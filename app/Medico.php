<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Medico extends Model
{
    public function getTotalMedicos()
    {
        return DB::table('medicos')->count();
    }

}
