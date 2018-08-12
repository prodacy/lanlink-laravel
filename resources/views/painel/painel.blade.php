@extends('layouts.app')

@section('content')



@if (session('status'))
<div class="alert alert-success" role="alert">
	{{ session('status') }}
</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Movimentações por Funcionários</h3>
	</div>
	<div class="panel-body">

		<div id="pop_div"></div>
		{!! $lavaGraf1->render('BarChart', 'TotalFuncionario', 'pop_div') !!}

	</div>
</div>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Movimentações por Depatamentos</h3>
	</div>
	<div class="panel-body">

		<div id="pop_div2"></div>
		{!! $lavaGraf1->render('DonutChart', 'TotalDepartamento', 'pop_div2') !!}

	</div>
</div>



@endsection