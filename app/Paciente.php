<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Paciente extends Model
{
    public function getTotalPacientes()
    {
        return DB::table('pacientes')->count();
    }
}
