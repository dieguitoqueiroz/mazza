<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;
use App\MedicosEspecialidade;

class MedicosController extends Controller
{
    private $Request;
    private $medico;
    private $especialidades;

    public function __construct(
        Request $request,
        Medico $medico,
        MedicosEspecialidade $especialidades
    ) {
        $this->Request = $request;
        $this->medico = $medico;
        $this->especialidades = $especialidades;
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
       return view('medicos.lista', [
           'medicos' => $this->medico::all(),
           'especialidades' => $this->especialidades
       ]);
   }

   private function cadastrar($action)
   {
       if($this->Request->isMethod('post')) {
           $this->validate($this->Request, [
               'nome' => 'required',
               'cpf' => 'required|unique:medicos',
               'especialidade' => 'required',
               'crm' => 'required|unique:medicos',
           ]);
           $medico = $this->medico;
           $medico->nome = $this->Request['nome'];
           $medico->especialidade = $this->Request['especialidade'];
           $medico->cpf = $this->Request['cpf'];
           $medico->crm = $this->Request['crm'];
           try {
               $medico->save();
               return redirect('medicos/listar');
           }catch(\Exception $e) {
               return $e->getMessage();
           }

       }
       else {
           $especialidades = $this->especialidades::all();
           return view('medicos.cadastro', [
               'action' => $action,
               'especialidades' => $especialidades
           ]);
       }
   }

   private function editar($action, $id)
   {
       if($this->Request->isMethod('post')) {
           $medico = $this->medico;

           try {
               $medico::where('id', $this->Request->id)->update([
                   'nome' => $this->Request['nome'],
                   'especialidade' => $this->Request['especialidade'],
               ]);
               return redirect('medicos/listar');
           }catch (\Exception $e) {
               return redirect('medicos/cadastrar');
           }

       }
       else {
           $medico = $this->medico::find($id);
           return view('medicos.cadastro', [
               'medico' => $medico,
               'action' => $action,
               'especialidades' => $this->especialidades::all()
           ]);
       }
   }

   private function excluir($action, $id)
   {
       try {
           $this->medico::destroy($id);
           return redirect('medicos/listar');
       }
       catch (\Exception $e) {

       }
   }
}
