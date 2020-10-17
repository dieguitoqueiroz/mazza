<?php


namespace App;


class Helpers
{
    public function formatDate($date) {
        $ano= substr($date, 6);
        $mes= substr($date, 3,-5);
        $dia= substr($date, 0,-8);
        return $ano."-".$mes."-".$dia;
    }

    public function formatDateToDisplay($date, $show_hour = false) {
        if(empty($date))
            return;

        $date = date_create($date);
        if(!$show_hour)
            return date_format($date, "d/m/Y");
        else
            return date_format($date, "d/m/Y H:i");
    }

    public function formatCPF($cpf)
    {
        return str_replace(['.','-'], '', $cpf);
    }
}