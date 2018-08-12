<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Departamento;
use App\Http\Requests\FuncionarioFormRequest;

class FuncionarioController extends Controller
{

    private $totalLinhas = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::paginate($this->totalLinhas);
        return view('painel.funcionario.index',compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departamentos = Departamento::all()->pluck('name','id');
        $departamentosOn = array();

        return view('painel.funcionario.manage', compact('departamentos','departamentosOn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioFormRequest $request)
    {

        $dataForm = $request->all();

        // dd($dataForm);

        

        if(!isset($dataForm['departamento'])){
            // mostra funcionários já existentes
            $funcionarios = Funcionario::paginate($this->totalLinhas);
            return view('painel.funcionario.index',compact('funcionarios','msgs'))
                    ->withErrors(['errors' => ['Você deve selecionar pelo menos um departamento'] ]);
        }

        $insert = Funcionario::create($dataForm);
        $insert->departamentos()->sync($dataForm['departamento']);
        
        if( $insert ){

            $msgs[] = 'Registro salvo com sucesso!';
            
            // mostra funcionários já existentes com o novo
            $funcionarios = Funcionario::paginate($this->totalLinhas);
            return view('painel.funcionario.index',compact('funcionarios','msgs'));
        }
        else{
            return redirect()->route('funcionarios.create');
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

     $funcionario = Funcionario::find($id);
     $departamentos = Departamento::all()->pluck('name','id');

     $departamentosOn = $funcionario->departamentos;


     return view('painel.funcionario.manage',compact('funcionario','departamentos','departamentosOn'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioFormRequest $request, $id)
    {

        $dataForm = $request->all();
        
        $funcionario = Funcionario::find($id);
        $departamentos = Departamento::all()->pluck('name','id');
        

        
        if(!isset($dataForm['departamento'])){
            $departamentosOn = $funcionario->departamentos;
            return view('painel.funcionario.manage',compact('funcionario','departamentos','departamentosOn'))->withErrors(['errors' => ['Você deve selecionar pelo menos um departamento'] ]);
        }

        $update = $funcionario->update($dataForm);

        if( $update ){

            $funcionario->departamentos()->sync($dataForm['departamento']);
            $departamentosOn = $funcionario->departamentos;

            $msgs[] = 'Registro atualizado com sucesso!';
            return view('painel.funcionario.manage',compact('funcionario','msgs','departamentos','departamentosOn'));
        }
        else{
            return redirect()->route('funcionarios.edit', $id)->with(['errors' => 'Falha ao editar']);
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
        $funcionario = Funcionario::find($id);
        
        $delete = $funcionario->delete();
        
        if( $delete ){
            $msgs[] = 'Registro deletado com sucesso!';
            $funcionarios = Funcionario::paginate($this->totalLinhas);
            return view('painel.funcionario.index',compact('funcionarios','msgs'));
        }
        else{
            return redirect()->route('funcionarios.index', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }

}
