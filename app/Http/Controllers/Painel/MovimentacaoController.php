<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Movimentacao;
use App\Models\Departamento;
use App\Models\Funcionario;
use App\Http\Requests\MovimentacaoFormRequest;

class MovimentacaoController extends Controller
{

     private $totalLinhas = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimentacoes = Movimentacao::paginate($this->totalLinhas);
        return view('painel.movimentacao.index',compact('movimentacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $movimentacoes = Movimentacao::all()->pluck('name','id');

        $departamentos = Departamento::all()->pluck('name','id');
        $funcionarios = Funcionario::all()->pluck('name','id');

        return view('painel.movimentacao.manage', compact('movimentacoes','departamentos','funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovimentacaoFormRequest $request)
    {

        $dataForm = $request->all();


        $insert = Movimentacao::create($dataForm);
        
        if( $insert ){
            $msgs[] = 'Registro salvo com sucesso!';
            $movimentacoes = Movimentacao::paginate($this->totalLinhas);
            return view('painel.movimentacao.index',compact('movimentacoes','msgs'));
        }
        else{
            return redirect()->route('movimentacoes.create');
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
        $movimentacao = Movimentacao::find($id);
        // dd($movimentacao);
        return view('painel.movimentacao.show',compact('movimentacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     $movimentacao = Movimentacao::find($id);
     $movimentacoes = Movimentacao::all()->pluck('name','id');


     return view('painel.movimentacao.manage',compact('movimentacao','movimentacoes'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovimentacaoFormRequest $request, $id)
    {

        $dataForm = $request->all();
        
        $movimentacao = Movimentacao::find($id);
        $update = $movimentacao->update($dataForm);

        if( $update ){
            $msgs[] = 'Registro atualizado com sucesso!';
            return view('painel.movimentacao.manage',compact('movimentacao','msgs'));
        }
        else{
            return redirect()->route('movimentacoes.edit', $id)->with(['errors' => 'Falha ao editar']);
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
        $movimentacao = Movimentacao::find($id);
        
        $delete = $movimentacao->delete();
        
        if( $delete ){
            $msgs[] = 'Registro deletado com sucesso!';
            $movimentacoes = Movimentacao::paginate($this->totalLinhas);
            return view('painel.movimentacao.index',compact('movimentacoes','msgs'));
        }
        else{
            return redirect()->route('movimentacoes.index', $id)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
