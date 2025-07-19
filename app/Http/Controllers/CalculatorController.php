<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator.calculator');
    }

    public function calculate(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operation = $request->input('operation');
        $result = null;

        if ($operation == '+') {
            $result = $num1 + $num2;
        }
        else if ($operation == '-') {
            $result = $num1 - $num2;
        }
        else if ($operation == '/') {
            $result = $num2 != 0 ? $num1 / $num2 : 'Cannot divide by zero';
        }
        else if ($operation == '*') {
            $result = $num1 * $num2;
        }

//        switch ($operation) {
//            case '+':
//                $result = $num1 + $num2;
//                break;
//            case '-':
//                $result = $num1 - $num2;
//                break;
//            case '*':
//                $result = $num1 * $num2;
//                break;
//            case '/':
//                $result = $num2 != 0 ? $num1 / $num2 : 'Cannot divide by zero';
//                break;
//        }

        return view('calculator.calculator', compact('result'));
    }

        public function calculateNew(Request $request)
    {

        $expression = $request->input('expression');
        $regex = '/^[0-9+\-*\/\s.]+$/';
        if (preg_match($regex, $expression)) {
            $result = eval("return {$expression};");
        } else {
                $result = 'Invalid input';
            }

        return view('calculator.calculatornew', compact('result'));
    }

}
