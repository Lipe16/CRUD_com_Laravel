<!-- extende o template principal -->
@extends('principal')
	<!--  Orienta o template principal sobre essa string -->
	@section('title', 'CLIENTES')
	<!-- inicia a seção a ser passada no template principal do blade template -->
	@section('content')
<h1>Contas a pagar</h1>

@if(old('nome'))
	<div class="alert alert-success" role="alert">
	  Operação realizada com sucesso!
	</div>
@endif

<table>
	<tr><th>ID</th><th>NOME</th><th>VALOR</th><th>Editar</th><th>Apagar</th></tr>
	
		
			@foreach($contas_pagar as $value)				

				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ $value->nome }}</td>
					<td>{{ $value->valor }}</td>

					<td><a class="btn btn-info btn-small" href="{{action('ContasPagarController@editar', $value->id)}}">Editar</a></td>
					<td><a class="btn btn-danger btn-small" href="{{action('ContasPagarController@apagar', $value->id)}}">Apagar</a></td>
				</tr>
		

		@endforeach
		
</table>

<a class="btn btn-success btn-small" href="{{action('ContasPagarController@cadastro', $value->id)}}">Novo</a>
@stop