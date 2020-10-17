<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Paciente;
use App\Medico;

class DashboardController extends Controller
{
    private $agenda;
    private $paciente;
    private $medico;

    public function __construct(
        Agenda $agenda,
        Paciente $paciente,
        Medico $medico
    )
    {
        $this->agenda = $agenda;
        $this->paciente = $paciente;
        $this->medico = $medico;
    }

    public function index()
    {
        return view('home', [
            'consultas_hoje' => $this->agenda->getTodaySchedules(),
            'total_pacientes' => $this->paciente->getTotalPacientes(),
            'total_medicos' => $this->medico->getTotalMedicos(),
        ]);
    }
}
