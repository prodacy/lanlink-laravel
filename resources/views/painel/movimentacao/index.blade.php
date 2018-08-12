@extends('layouts.app')

@section('content')

<div class="panel panel-default">

	<!-- Default panel contents -->
	<div class="panel-heading">
		Movimentações
		<a href="{{route('movimentacoes.create')}}" class="btn btn-success navbar-right">Adicionar</a>
	</div>

	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th >Funcionário</th>
				<th >Departamento</th>
				<th >Valor</th>
				<th >Data/Hora</th>
				<th >Ações</th>
			</tr>
		</thead>

		@foreach($movimentacoes as $movimentacao)
		<tr>
			<td>{{$movimentacao->funcionario->name}}</td>
			<td>{{$movimentacao->departamento->name}}</td>
			<td>R$ {{number_format($movimentacao->valor,2,',','.')}}</td>
			<td>{{$movimentacao->created_at->format("d/m/Y H:i")}}h</td>
			<td>
				
				<a href="{{route('movimentacoes.show', $movimentacao->id)}}" class="bshow"> 
					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
				</a>
				<a href="{{route('movimentacoes.destroy', $movimentacao->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Deseja realmente apagar '{{$movimentacao->name}}'" class="delete">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
			</td>
		</tr>
		@endforeach
	</table>

</div>

<center>
	<div class="row justify-content-center">
		{!!$movimentacoes->links()!!}
	</div>
</center>


@endsection