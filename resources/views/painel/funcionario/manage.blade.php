@extends('layouts.app')

@section('content')

@if( isset($funcionario) )
{!! Form::model($funcionario, ['route' => ['funcionarios.update', $funcionario->id], 'class' => 'form', 'method' => 'put' ]) !!}
@else
{!! Form::open(['route' => 'funcionarios.store', 'class' => 'form']) !!}
@endif

<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
    {!! Form::select('departamento[]', $departamentos, $departamentosOn, ['class' => 'form-control' , 'multiple'=>'multiple']) !!}
</div>

{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection