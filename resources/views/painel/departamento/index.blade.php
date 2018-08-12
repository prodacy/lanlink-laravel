@extends('layouts.app')

@section('content')



<div class="panel panel-default">



	<!-- Default panel contents -->
	<div class="panel-heading">
		Departamentos
		<a href="{{route('departamentos.create')}}" class="btn btn-success navbar-right">Adicionar</a>
	</div>

	<!-- Table -->
	<table class="table">
		<thead>
		<tr>
			<th class="col-md-12">Nome</th>
			<th >Ações</th>
		</tr>
	</thead>

		@foreach($departamentos as $departamento)
		<tr>
			<td>{{$departamento->name}}</td>
			<td>
				<a href="{{route('departamentos.edit', $departamento->id)}}" class="edit"> 
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
				</a>
				<a href="{{route('departamentos.destroy', $departamento->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Deseja realmente apagar '{{$departamento->name}}'" class="delete">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>

			</td>
		</tr>
		@endforeach
	</table>

</div>

<center>
	<div class="row justify-content-center">
		{!!$departamentos->links()!!}
	</div>
</center>


@endsection