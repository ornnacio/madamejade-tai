<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\GraficoVendas;

class VendasController extends Controller
{
    public function index(GraficoVendas $g){
      return view('vendas', ['chart' => $g->build()]);
    }
}
