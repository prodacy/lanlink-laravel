<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Http\Requests\DepartamentoFormRequest;

class DepartamentoController extends Controller
{

    private $totalLinhas = 10;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::paginate($this->totalLinhas);
        return view('painel.departamento.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departamentos = Departamento::all()->pluck('name','id');
        return view('painel.departamento.manage', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoFormRequest $request)
    {

        $dataForm = $request->all();


        $insert = Departamento::create($dataForm);
        
        if( $insert ){
            $msgs[] = 'Registro salvo com sucesso!';
            $departamentos = Departamento::paginate($this->totalLinhas);
            return view('painel.departamento.index',compact('departamentos','msgs'));
        }
        else{
            return redirect()->route('departamentos.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     $funcionario = Departamento::find($id);
     $departamentos = Departamento::all()->pluck('name','id');


     return view('painel.departamento.manage',compact('funcionario','departamentos'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoFormRequest $request, $id)
    {

        $dataForm = $request->all();
        
        $funcionario = Departamento::find($id);
        $update = $funcionario->update($dataForm);

        if( $update ){
            $msgs[] = 'Registro atualizado com sucesso!';
            return view('painel.departamento.manage',compact('funcionario','msgs'));
        }
        else{
            return redirect()->route('departamentos.edit', $id)->with(['errors' => 'Falha ao editar']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Departamento::find($id);
        
        $delete = $funcionario->delete();
        
        if( $delete ){
            $msgs[] = 'Registro deletado com sucesso!';
            $departamentos = Departamento::paginate($this->totalLinhas);
            return view('painel.departamento.index',compact('departamentos','msgs'));
        }
        else{
            return redirect()->route('departamentos.index', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}