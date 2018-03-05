<!-- extende o template principal -->
@extends('principal')
	<!--  Orienta o template principal sobre essa string -->
	@section('title', 'EDITAR')
	<!-- inicia a seção a ser passada no template principal do blade template -->
	@section('content')
<h1>
	Editar
</h1>

<form action="{{action('ContasPagarController@update', $contas_pagar->id)}}"  method="post">
	<input type="hidden" name="_token" value="{{{csrf_token()}}}">
	<div>
		<label>Nome: </label>
		<input type="text" name="nome" class="form-control" value="{{$contas_pagar->nome}}">
	</div>

	<div>
		<label>Valor: </label>
		<input type="text" name="valor" class="form-control" value="{{$contas_pagar->valor}}">
	</div>
	<button type="submit" class="btn btn-success">Salvar</button>
</form>
@stop