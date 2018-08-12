@extends('layouts.app')

@section('content')

@if( isset($movimentacao) )
{!! Form::model($movimentacao, ['route' => ['movimentacoes.update', $movimentacao->id], 'class' => 'form', 'method' => 'put' ]) !!}
@else
{!! Form::open(['route' => 'movimentacoes.store', 'class' => 'form']) !!}
@endif


<div class="form-group">
    {!! Form::select('funcionario_id', $funcionarios, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::number('valor', null, ['class' => 'form-control','step' => '0.1' , 'placeholder' => 'Valor']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('descricao', null, ['class' => 'form-control','step' => '0.1' , 'placeholder' => 'Descrição da movimentação']) !!}
</div>

{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection