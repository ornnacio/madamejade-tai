<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\File;
use PDF;

class ProdutosController extends Controller
{

    public function adicionar(){

		return view('adicionar_produto');
	}

	public function store(Request $rq){

		if(!is_numeric($rq->preço)){
			return redirect('adicionar_produto')->with('error', 'Preço inválido');
		}else if(!is_numeric($rq->quantidade)){
			return redirect('adicionar_produto')->with('error', 'Quantidade inválida');
		}else{
			$input = $rq->all();

			 $image = $rq->file("nome_arquivo");

			 if ($image) {
					 $nome_arquivo = date('YmdHis') . "." . $image->getClientOriginalExtension();

					 $rq->nome_arquivo->storeAs('public/imagem', $nome_arquivo);

					 $input['nome_arquivo'] = $nome_arquivo;
			 }

			 Produto::create($input);

			return redirect('produtos');
		}
	}

	public function show(){

		$arrProdutos = Produto::paginate(10);
		return view('produtos', ['produtos' => $arrProdutos]);
	}

	public function search(Request $rq){

		if($rq){
			$tipoPesquisa = $rq->tipo;
			$termo = $rq->termo;
			$arrProdutos = Produto::where($tipoPesquisa, 'like', "%{$termo}%")->get();
		}else{
			$arrProdutos = Produto::all();
		}

		return view('produtos', ['produtos' => $arrProdutos]);
	}

	public function edit($id){

		$p = Produto::findOrFail($id);
		return view('editar_produto', ['produto' => $p]);
	}

	public function update(Request $r, $id){

		$p = Produto::findOrFail($id);

		if(!is_numeric($r->preço)){
			return redirect()->route('editar_produto', ['id' => $id])->with('error', 'Preço inválido');
		}else if(!is_numeric($r->quantidade)){
			return redirect()->route('editar_produto', ['id' => $id])->with('error', 'Quantidade inválida');
		}else{

			$image = $r->file("nome_arquivo");
			$nome_arquivo = null;

			if ($image) {
					$nome_arquivo = date('YmdHis') . "." . $image->getClientOriginalExtension();

					$r->nome_arquivo->storeAs('public/imagem', $nome_arquivo);
			}

			$p->update([
				'nome' => $r->nome,
				'desc' => $r->desc,
				'preço' => $r->preço,
				'quantidade' => $r->quantidade,
				'nome_arquivo' => $nome_arquivo,
			]);
		}

		return redirect('produtos');
	}

	public function destroy($id){

		$p = Produto::findOrFail($id);
		$filename = $p->nome_arquivo;
		File::delete('storage/imagem/'.$filename);
		$p->delete();

		return redirect('produtos');
	}

	public function gerar(){

		$arrProdutos = Produto::all();

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
				<h2 style="text-align: center;">Relatório de produtos</h2>
				<table style="width: 100%">
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Preço</th>
						<th>Quantidade</th>
					</tr>
		';

		foreach ($arrProdutos as $p){
			$string .= "
				<tr>
					<th>{$p->id}</th>
					<td>{$p->nome}</td>
					<td>{$p->desc}</td>
					<td>R$ {$p->preço}</td>
					<td>{$p->quantidade}</td>
				</tr>
			";
		}

		$string.= "
			</table>
		</body>";

		$pdf = PDF::loadHTML($string);
		return $pdf->stream();
	}
}
