<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorPrincipal extends Controller
{
    public function index()
    {
        return view('receitas');
        
    }

    public function receitas(Request $request)
    {
        $salario = $request->input('salario');
        $outras = $request->input('outras');
        $totalR = $salario + $outras;
        session(['rec' => $totalR]);
        return view('despesas');
    }

    public function despesas(Request $request)
    {
        $aluguel = $request->input('aluguel');
        $mercado = $request->input('mercado');
        $escola = $request->input('escola');
        $imposto = $request->input('imposto');
        $outras = $request->input('outras');
        $totalD = $aluguel + $mercado + $escola + $imposto + $outras;
        $rec = session('rec');
        $saldo = $rec - $totalD;
        
        if ($saldo > 0){
            $dados = array("receitas" => number_format($rec, 2, ',', '.'),"saldo" => number_format($saldo, 2, ',', '.'), 
                           "despesas" => number_format($totalD, 2, ',', '.'),"resultado" => "Saldo Positivo");
            return view('resultado', compact('dados'));
        } else if ($saldo < 0) {
            $dados = array("receitas" => number_format($rec, 2, ',', '.'),"saldo" => number_format($saldo, 2, ',', '.'), 
                           "despesas" => number_format($totalD, 2, ',', '.'),"resultado" => "Saldo Negativo");
            return view('resultado', compact('dados'));
        } else {
            $dados = array("receitas" => number_format($rec, 2, ',', '.'),"saldo" => number_format($saldo, 2, ',', '.'),
                           "despesas" => number_format($totalD, 2, ',', '.'),"resultado" => "Não há saldo entre receitas e despesas");
            return view('resultado', compact('dados'));
        }
    }
}
