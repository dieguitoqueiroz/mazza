<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Agenda extends Model
{
    protected $table = 'agenda';
    //

    public function getTodaySchedules()
    {
        $today = date('Y-m-d');
        $data = [];
        $medicos = DB::table('medicos')->orderBy('nome', 'asc')->get();

        foreach ($medicos as $key => $medico) {
            $total_consultas = DB::table('agenda')
                ->where('id_medico', '=', $medico->id)
                ->whereDate('data', $today)
                ->count();
            $data[$key]['nome_medico'] = $medico->nome;
            $data[$key]['total_consultas'] = $total_consultas;
        }

        return $data;
    }

    public function getSchedules($id_medico = '')
    {
        if (empty($id_medico)){
            return DB::table($this->table)
                ->leftJoin('medicos', 'medicos.id', '=', 'agenda.id_medico')
                ->leftJoin('pacientes', 'pacientes.id', '=', 'agenda.id_paciente')
                ->select('agenda.*', 'medicos.nome as nome_medico', 'medicos.color', 'pacientes.nome as nome_paciente')
                ->get();
        }
        else {
            return DB::table($this->table)
                ->leftJoin('medicos', 'medicos.id', '=', 'agenda.id_medico')
                ->leftJoin('pacientes', 'pacientes.id', '=', 'agenda.id_paciente')
                ->select('agenda.*', 'medicos.nome as nome_medico', 'medicos.color', 'pacientes.nome as nome_paciente')
                ->where('id_medico', '=', $id_medico)
                ->get();
        }
    }
}
