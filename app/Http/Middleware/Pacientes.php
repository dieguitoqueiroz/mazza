<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers;

class Pacientes
{
    private $helpers;

    public function __construct(Helpers $helpers)
    {
        $this->helpers = $helpers;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data_nasc = $request->input('data_nasc');
        $cpf = $request->input('cpf');

        if($data_nasc)
            $request['data_nasc'] = $this->helpers->formatDate($data_nasc);
        if($cpf)
            $request['cpf'] = $this->helpers->formatCPF($cpf);

        $response =  $next($request);
        return $response;
    }
}
