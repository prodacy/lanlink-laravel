@extends('layouts.app')

@section('content')



<div class="panel panel-default">



	<!-- Default panel contents -->
	<div class="panel-heading">
		Funcionários
		<a href="{{route('funcionarios.create')}}" class="btn btn-success navbar-right">Adicionar</a>
	</div>

	<!-- Table -->
	<table class="table">
		<thead>
		<tr>
			<th class="col-md-12">Nome</th>
			<th >Ações</th>
		</tr>
	</thead>

		@foreach($funcionarios as $funcionario)
		<tr>
			<td>{{$funcionario->name}}</td>
			<td>
				<a href="{{route('funcionarios.edit', $funcionario->id)}}" class="edit"> 
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
				</a>
				<a href="{{route('funcionarios.destroy', $funcionario->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Deseja realmente apagar '{{$funcionario->name}}'" class="delete">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>

			</td>
		</tr>
		@endforeach
	</table>

</div>

<center>
	<div class="row justify-content-center">
		{!!$funcionarios->links()!!}
	</div>
</center>


@endsection