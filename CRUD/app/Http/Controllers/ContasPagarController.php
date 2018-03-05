<?php

namespace App\Http\Controllers;

use Request;

use Validator;//para validar formulários

use App\ContasPagar;

//para usar funções de DB
use Illuminate\Support\Facades\DB;

class ContasPagarController extends Controller
{
    //

    public function listar(){

    	/*
    	ESSE TRECHO DE COMENTÁRIO MOSTRA COMO SERIA USAR SQL PARA ACESSAR MEU BANCO DE DADOS NO LARAVEL
    	PORÉM NÃO VOU USAR ISSO POIS TENHO O FRAMEWORK ENLOQUENT QUE É UM ORM PARA PHP
    	//para usar funções de DB
		use Illuminate\Support\Facades\DB;
    	$contas_pagar = DB::select('select * from contas_pagar');
    	*/

    	$contas_pagar = ContasPagar::all();


    	return view('listar')->with('contas_pagar', $contas_pagar);
    }


    public function cadastro(){

        return view('cadastro');
    }



    public function editar($id){
        $contas_pagar = ContasPagar::find($id);

        if(empty($contas_pagar)){
            return 'NÃO EXISTE O REGISTRO INFORMADO';
        }
        else{
            return view('editar')->with('contas_pagar',$contas_pagar);
        }
    }

    public function apagar($id){
        $contas_pagar = ContasPagar::find($id);

        $contas_pagar->delete();

        return redirect()->action('ContasPagarController@listar');
    }


    public function update($id){
        
        $nome = Request::input('nome');
        $valor = Request::input('valor');

        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->nome = $nome;
        $contas_pagar->valor = $valor;
        $contas_pagar->save();

        return redirect()->action('ContasPagarController@listar')->withInput();//withInput envia os inputs recuperados com request de volta

    }


    public function salvar(){

        $nome = Request::input('nome');
        $valor = Request::input('valor');

        /* INSERINDO DADOS SEM O ENLOQUENT ORM, NO PURO SQL
        DB::insert('insert into contas_pagar (nome, valor) values(?,?)',array($nome ,$valor ));
        
        */

        //usando Validator::make do laravel para validar o formulário
        $validator = Validator::make(
        [
            'descricao' => $nome,
            'valor' => $valor
        ],
        [
            'descricao' => 'required|min:6',
            'valor' => 'required|numeric'
        ],
        [
            'required' => ':attribute é obrigatório.',
            'numeric' => ':attribute precisa ser númerico.',
            'min' => ':attribute precisa ter pelo menos 6 caracteres.'
        ]
        );   

        //caso formulário não esteja nnos conformes os dados não serão salvos, redirecionando usuario de volta ao mesmo formulário
        if ($validator->fails()){
            return redirect()->action('ContasPagarController@cadastro')->withErrors($validator)->withInput();//redireciona e devolve valor dos inputs com withInput
        }


        //INSERINDO DADOS COM A CLASSE MODEL (QUE USA ENLOQUENT ORM)
        $contas_pagar = new ContasPagar();
        $contas_pagar->nome = $nome;
        $contas_pagar->valor = $valor;
        $contas_pagar->save();


        return redirect()->action('ContasPagarController@listar')->withInput();//withInput envia os inputs recuperados com request de volta
    }

}
