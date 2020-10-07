<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers;

class Agenda
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
        $data_agenda = $request->input('data');

        if($data_agenda)
            $request['data'] = $this->helpers->formatDate($data_agenda);

        return $next($request);
    }
}
