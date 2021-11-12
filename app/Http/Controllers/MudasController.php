<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muda;

class MudasController extends Controller
{
	
	public function adicionar(){
		
		return view('adicionar_muda');
	}
	
    public function show(){
		
		$arrMudas = Muda::all();
		return view('mudas', ['mudas' => $arrMudas]);
	}
	
	public function search(Request $rq){
		
		if($rq){
			$termo = $rq->termo;
			$arrMudas = Muda::where('espécie', 'like', "%{$termo}%")->get();
		}else{
			$arrMudas = Muda::all();
		}
		
		return view('mudas', ['mudas' => $arrMudas]);
	}
	
	public function store(Request $rq){
		
		if(!is_numeric($rq->número_filhas)){
			return redirect('adicionar_muda')->with('msg', 'Número de filhas inválido');
		}else{
			Muda::create([
				'espécie' => $rq->espécie,
				'data_plantação' => $rq->data_plantação,
				'data_germinação' => $rq->data_germinação,
				'número_filhas' => $rq->número_filhas,
			]);
		}
		
		return redirect('mudas');
		
	}
	
	public function edit($id){
		
		$m = Muda::findOrFail($id);
		return view('editar_muda', ['muda' => $m]);
	}
	
	public function update(Request $r, $id){
		
		$m = Muda::findOrFail($id);
		
		if(!is_numeric($r->número_filhas)){
			return redirect()->route('editar_muda', ['id' => $id])->with('msg', 'Número de filhas inválido');
		}else{
			$m->update([
				'espécie' => $r->espécie,
				'data_plantação' => $r->data_plantação,
				'data_germinação' => $r->data_germinação,
				'número_filhas' => $r->número_filhas,
			]);
		}
		
		return redirect('mudas');
	}
	
	public function destroy($id){
		
		$m = Muda::findOrFail($id);
		$m->delete();
		
		return redirect('mudas');
	}
}
