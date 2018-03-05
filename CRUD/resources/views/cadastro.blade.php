<!-- extende o template principal -->
@extends('principal')
	<!--  Orienta o template principal sobre essa string -->
	@section('title', 'CADASTRO')
	<!-- inicia a seção a ser passada no template principal do blade template -->
	@section('content')
<h1>
	Cadastro
</h1>

<!--verifica se o Validator do controler retornou erros de validação no formulário-->
@if (count($errors) > 0)
	<div class="alert alert-danger">
	<strong>Erros:</strong>
		<ul>	
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

<form action="{{action('ContasPagarController@salvar')}}"  method="post">
	<input type="hidden" name="_token" value="{{{csrf_token()}}}">
	<div>
		<label>Nome: </label>
		<input type="text" name="nome" value="{{old('nome')}}" class="form-control">
	</div>

	<div>
		<label>Valor: </label>
		<input type="text" name="valor" value="{{old('valor')}}" class="form-control">
	</div>
	<button type="submit" class="btn btn-success">Salvar</button>
</form>
@stop