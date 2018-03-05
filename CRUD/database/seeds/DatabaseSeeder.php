<?php

use Illuminate\Database\Seeder;

//para usar funções de DB
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder //para executar essa classe use o comando no cmd 'php artisan db:seed'
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ContasPagarTableSeeder');
    }
}


class ContasPagarTableSeeder extends Seeder{

	public function run(){

		DB::insert('insert into contas_pagar (nome, valor) values(?,?)', array('Pagamento telefone', '150.00') );

		DB::insert('insert into contas_pagar (nome, valor) values(?,?)', array('Pagamento Luz', '130.00') );
	}
}
