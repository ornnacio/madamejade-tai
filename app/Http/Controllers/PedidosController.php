<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Produto;
use App\Models\Pedido;
use App\Mail\SendMailPedidos;
use PDF;

class PedidosController extends Controller
{
    public function show(){

		$arrPedidos = Pedido::paginate(10);
		return view('pedidos', ['pedidos' => $arrPedidos]);
	}

	public function search(Request $rq){

		if($rq){
			$tipoPesquisa = $rq->tipo;
			$termo = $rq->termo;
			$arrPedidos = Pedido::where($tipoPesquisa, 'like', "%{$termo}%")->paginate(10);
		}else{
			$arrPedidos = Pedido::paginate(10);
		}

		return view('pedidos', ['pedidos' => $arrPedidos]);
	}

	public function adicionar(){

		$arrProdutos = Produto::all();
		return view('adicionar_pedido', ['produtos' => $arrProdutos]);
	}

	public function store(Request $rq){

		if(!is_numeric($rq->total)){
			return redirect('adicionar_pedido')->with('error', 'Total inválido');
		}else{
			Pedido::create([
				'cliente' => $rq->cliente,
				'descrição' => $rq->desc,
				'total' => $rq->total,
				'id_produto' => (int)$rq->id_produto,
			]);

			return redirect('pedidos');
		}
	}

	public function edit($id){

		$p = Pedido::findOrFail($id);
		$arrProdutos = Produto::all();
		return view('editar_pedido', ['pedido' => $p, 'produtos' => $arrProdutos]);
	}

	public function update(Request $rq, $id){

		$p = Pedido::findOrFail($id);

		if(!is_numeric($rq->total)){
			return redirect()->route('editar_pedido', ['id' => $id])->with('error', 'Total inválido');
		}else{
			$p->update([
				'cliente' => $rq->cliente,
				'descrição' => $rq->desc,
				'total' => $rq->total,
				'id_produto' => (int)$rq->id_produto,
			]);
		}

		return redirect('pedidos');
	}

	public function destroy($id){

		$p = Pedido::findOrFail($id);
		$p->delete();

		return redirect('pedidos');
	}

	public function gerar(){

		$arrPedidos = Pedido::all();

		$string = '
			<head>
				<style>
				body{
					font-family: Arial, sans-serif;
				}

				table, th, td {
					padding: 5px;
				}

				tr:nth-child(odd){
					background-color: #ffde59;
				}

				tr:nth-child(even){
					background-color: #ffefac;
				}
				</style>
			</head>
			<body>
				<h2 style="text-align: center;">Relatório de pedidos</h2>
				<table style="width: 100%">
					<tr>
						<th>#</th>
						<th>Cliente</th>
						<th>Descrição</th>
						<th>Total</th>
						<th>Produto</th>
					</tr>
		';

		foreach ($arrPedidos as $p){

			$prod = Produto::findOrFail($p->id_produto);

			$string .= "
				<tr>
					<th>{$p->id}</th>
					<td>{$p->cliente}</td>
					<td>{$p->descrição}</td>
					<td>R$ {$p->total}</td>
					<td>{$prod->nome}</td>
				</tr>
			";
		}

		$string.= "
			</table>
		</body>";

		$pdf = PDF::loadHTML($string);
		return $pdf->stream();
	}

  public function email(){

    $pedidos = Pedido::all();

    Mail::to('37123fa213@emailnax.com')
          ->send(new SendMailPedidos($pedidos));

    return redirect('pedidos')->with('success', 'Email enviado com sucesso!');
  }
}
