<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraIMC extends Controller
{
    public function calculadora()
    {
        return view('calculadora');

    }

    public function calcular(Request $request)
    {
        $altura = $request->altura;
        $peso = $request->peso;
        $sexo = $request->sexo;

        $imc = $peso / ($altura * $altura);

        $imc = number_format($imc * 10000, 1);

        if ($sexo == 'masculino') {
            $resultado = $this->masculino($imc);
        } else {
            $resultado = $this->feminino($imc);
        }

//        echo "<h1> $imc $resultado </h1>";
        return view('calculadora', compact('imc', 'resultado'));
    }

    public function masculino($imc)
    {
        switch ($imc) {

            case ($imc > 39):
                $resultado = "Obesidade mórbida";
                break;
            case ($imc >= 30 && $imc <= 39):
                $resultado = "obesidade moderada";
                break;
            case($imc >= 25 && $imc < 30):
                $resultado = "obesidade leve";
                break;
            case ($imc >= 20 && $imc < 25):
                $resultado = "normal";
                break;
            case($imc <= 20):
                $resultado = "abaixo do normal";

                break;
        }
        return $resultado;
    }

    public function feminino($imc)
    {
        switch ($imc) {

            case ($imc >= 39):
                $resultado = "Obesidade Mórbida";
                break;
            case ($imc >= 29 && $imc <= 38.9):
                $resultado = "Obesidade Moderada";
                break;
            case($imc >= 24 && $imc <= 28.9):
                $resultado = "Obesidade Leve";
                break;
            case ($imc >= 19 && $imc <= 23.9):
                $resultado = "normal";
                break;
            case($imc <= 19):
                $resultado = "abaixo do normal";
                break;
        }
        return $resultado;
    }
}
