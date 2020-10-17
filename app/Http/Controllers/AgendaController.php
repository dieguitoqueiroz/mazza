<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Paciente;
use App\Medico;
use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    private $Request;
    private $pacientes;
    private $medicos;
    private $agenda;
    private $helpers;

    public function __construct(
        Request $request,
        Helpers $helpers,
        Paciente $pacientes,
        Agenda $agenda,
        Medico $medicos
    ) {
        $this->Request = $request;
        $this->helpers = $helpers;
        $this->pacientes = $pacientes;
        $this->medicos = $medicos;
        $this->agenda = $agenda;
    }
    public function index($action = '', $id = '')
    {
        if(!method_exists($this, $action))
            return view('errors.404');

        if(!empty($action))
            return $this->{$action}($action, $id);
    }

    private function listar()
    {
        return view('agenda.lista', [
            'paciente' => $this->pacientes,
            'medico' => $this->medicos,
            'agenda' => $this->agenda::all(),
            'helper' => $this->helpers,
        ]);
    }

    private function consultas()
    {
        $id_medico = $this->Request->input('id_medico');
        $consultas = $this->agenda->getSchedules($id_medico);
        $data = [];

        foreach ($consultas as $key => $consulta) {
            $data[$key]['title'] = $consulta->nome_paciente;
            $data[$key]['start'] = $consulta->data . ' ' . $consulta->hora_inicio;
            $data[$key]['color'] = $consulta->color;
        }
        $data = json_encode($data);
        return $data;
    }

    private function editar($action, $id)
    {
        if($this->Request->isMethod('post')) {
            $agenda = $this->agenda;

            try {
                $agenda::where('id', $this->Request->id)->update([
                    'id_medico' => $this->Request['id_medico'],
                    'id_paciente' => $this->Request['id_paciente'],
                    'data' => $this->Request['data'],
                    'hora_inicio' => $this->Request['hora'],
                ]);
                return redirect('agenda/listar');
            }catch (\Exception $e) {
                return redirect('agenda/cadastrar');
            }

        }
        else {
            $agenda = $this->agenda::find($id);
            return view('agenda.cadastro', [
                'pacientes' => $this->pacientes,
                'medicos' => $this->medicos,
                'agenda' => $agenda,
                'action' => $action,
                'helper' => $this->helpers
            ]);
        }
    }

    private function cadastrar($action, $id)
    {
        if($this->Request->isMethod('get')) {
            return view('agenda.cadastro', [
                'pacientes' => $this->pacientes,
                'medicos' => $this->medicos,
                'action' => $action,
                'helper' => $this->helpers,
            ]);
        }
        else {
            $agenda = $this->agenda;
            $agenda->id_medico = $this->Request->input('id_medico');
            $agenda->id_paciente = $this->Request->input('id_paciente');
            $agenda->data = $this->Request->input('data');
            $agenda->hora_inicio = $this->Request->input('hora');

            try {
                $agenda->save();
                return redirect('agenda/listar');
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    private function excluir($action, $id)
    {
        try {
            $this->agenda::destroy($id);
            return redirect('agenda/listar');
        }
        catch (\Exception $e) {

        }
    }
}
