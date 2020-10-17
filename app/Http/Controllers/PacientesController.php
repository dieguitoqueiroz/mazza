<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Helpers;

class PacientesController extends Controller
{
    private $Request;
    private $pacientes;
    private $helpers;

    public function __construct(
        Request $request,
        Helpers $helpers,
        Paciente $pacientes
    ) {
        $this->Request = $request;
        $this->helpers = $helpers;
        $this->pacientes = $pacientes;
    }
    public function index($action = '', $id = '')
    {
        if(!method_exists($this, $action))
            return view('errors.404');

        if(!empty($action))
            return $this->{$action}($action, $id);
    }

    private function listar($action, $id)
    {
        if(!empty($id)) {
            return $this->pacientes::find($id);
        }
        return view('pacientes.lista', [
            'pacientes' => $this->pacientes::all(),
            'helper' => $this->helpers,
        ]);
    }

    private function cadastrar($action, $id)
    {
        if($this->Request->isMethod('post')) {

            $this->validate($this->Request, [
                'nome' => 'required',
                'cpf' => 'required|unique:pacientes',
            ]);

            try {
                $data = $this->Request->all();
                $paciente = $this->pacientes;

                foreach ($data as $key => $value) {
                    if($key != '_token')
                        $paciente->{$key} = $value;
                }
                $paciente->save();
                return redirect('pacientes/listar');
            } catch (\Exception $e) {
                return redirect('pacientes/cadastrar');
            }
        }
        else {
            return view('pacientes.cadastro', ['action' => $action]);
        }
    }

    private function editar($action, $id)
    {
        if($this->Request->isMethod('post')) {
            $paciente = $this->pacientes;

            try {
                $paciente::where('id', $this->Request->id)->update([
                    'nome' => $this->Request['nome'],
                ]);
                return redirect('pacientes/listar');
            }catch (\Exception $e) {
                return redirect('pacientes/cadastrar');
            }

        }
        else {
            $paciente = $this->pacientes::find($id);
            return view('pacientes.cadastro', [
                'paciente' => $paciente,
                'action' => $action,
            ]);
        }
    }

    private function excluir($action, $id)
    {
        try {
            $this->pacientes::destroy($id);
            return redirect('pacientes/listar');
        }
        catch (\Exception $e) {

        }
    }
}
