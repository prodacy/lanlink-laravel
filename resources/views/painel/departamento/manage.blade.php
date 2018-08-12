@extends('layouts.app')

@section('content')

@if( isset($departamento) )
{!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id], 'class' => 'form', 'method' => 'put' ]) !!}
@else
{!! Form::open(['route' => 'departamentos.store', 'class' => 'form']) !!}
@endif

<div class="form-group">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>


{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection