<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContasPagar extends Model
{
    //

	protected $table = 'contas_pagar';//define nome da tabela porque por padrão seria contas_pagars
	public $timestamps = true;// usa recurso de data e hora que qualquer registro foi inserido ou alterado no banco de dados
}
