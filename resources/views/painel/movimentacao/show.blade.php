@extends('layouts.app')

@section('content')

<div class="panel panel-default">

	<!-- Default panel contents -->
	<div class="panel-heading warning">
		
		<p> <b>Funcionário:</b> {{$movimentacao->funcionario->name}}</p>
		<p> <b>Departamento:</b> {{$movimentacao->departamento->name}}</p>
		<p> <b>Valor:</b> R$ {{number_format($movimentacao->valor,2,',','.')}}</p>
		<p> <b>Realizado em:</b> {{$movimentacao->created_at->format("d/m/Y H:i")}}h</p>
		<p> <b>Descrição:</b> {{$movimentacao->desscricao}}</p>

	</div>

</div>


@endsection