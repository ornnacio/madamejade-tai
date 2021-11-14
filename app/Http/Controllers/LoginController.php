<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LoginController extends Controller
{
    public function cadastro(){
		return view('cadastro');
	}

	public function login(){
		return view('login');
	}

	public function inicial(){
		return view('inicial');
	}

	public function store(Request $rq){

		$login = new App\Models\Login;

		$email = $rq->email;
		$senha = $rq->senha;
		$confSenha = $rq->conf_senha;

		if($senha == $confSenha){

			$checkEmail = App\Models\Login::where('email', $email)->get();

			if(count($checkEmail) > 0){
				return redirect('cadastro')->with('error', 'Email já cadastrado');
			}

			$login->email = $email;
			$login->senha = $senha;

			$created=$login->save();

			if($created){
				return redirect('login')->with('success', 'Registrado com sucesso!');
			}
		}else{
			return redirect('cadastro')->with('error', 'Confirmação e senha diferem');
		}

	}

	public function verificar(Request $rq){

		$email = $rq->email;
		$senha = $rq->senha;

		$session = App\Models\Login::where('email', $email)->where('senha', $senha)->get();

		if(count($session) > 0){
			$rq->session()->put('user_id', $session[0]->id);
			$rq->session()->put('user_email', $session[0]->email);

			return redirect('inicial');
		}else{
			$rq->session()->forget('success');
			return redirect('login')->with('error', 'Email ou senha inválidos');
		}

	}

	public function sair(Request $rq){

		$rq->session()->forget('user_id');
		$rq->session()->forget('user_email');

		return redirect('/');
	}

}
