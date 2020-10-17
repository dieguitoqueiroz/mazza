<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Helpers;

class UsersController extends Controller
{
    private $user;
    private $Request;
    private $helpers;

    public function __construct(
        User $user,
        Request $request,
        Helpers $helpers
    )
    {
        $this->user = $user;
        $this->Request = $request;
        $this->helpers = $helpers;
    }

    public function index($action = '', $id='')
    {
        if(!method_exists($this, $action))
            return view('errors.404');

        if(!empty($action))
            return $this->{$action}($action, $id);
    }

    public function listar()
    {
        return view('users.lista', [
            'users' => $this->user::all(),
            'helpers' => $this->helpers,
        ]);
    }

    private function editar($action, $id)
    {
        if($this->Request->isMethod('post')) {
            $user = $this->user;

            try {
                $user::where('id', $this->Request->id)->update([
                    'name' => $this->Request['name'],
                    'email' => $this->Request['email'],
                ]);
                return redirect('users/listar');
            }catch (\Exception $e) {
                return redirect('/register');
            }

        }
        else {
            $user = $this->user::find($id);
            return view('auth.register', [
                'user' => $user,
                'action' => $action
            ]);
        }
    }

    public function excluir($action, $id)
    {
        try {
            $this->user::destroy($id);
            return redirect('users/listar');
        }
        catch (\Exception $e) {

        }
    }
}
