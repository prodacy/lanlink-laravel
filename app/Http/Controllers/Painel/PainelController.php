<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use App\Models\Movimentacao;

class PainelController extends Controller
{
	public function index()
	{

		
		$lavaGraf1 = new Lavacharts();


		
		

		$movimentacoes = Movimentacao::all();

		$porFuncionario = array();
		$porDepartamento = array();
		foreach ($movimentacoes as $movimentacao) {
			$porFuncionario[$movimentacao->funcionario->name] 
			= isset($porFuncionario[$movimentacao->funcionario->name]) 
			? $porFuncionario[$movimentacao->funcionario->name] + $movimentacao->valor
			: $movimentacao->valor;

			$porDepartamento[$movimentacao->departamento->name] 
			= isset($porDepartamento[$movimentacao->departamento->name]) 
			? $porDepartamento[$movimentacao->departamento->name] + $movimentacao->valor
			: $movimentacao->valor;
		}

		// Por Funcionário
		$totais = $lavaGraf1->DataTable();
		$totais->addStringColumn('Funcionário')->addNumberColumn('Total (R$)');
		foreach ($porFuncionario as $funcionario => $soma) {
			$totais->addRow([$funcionario, (float) $soma]);
		}

		$lavaGraf1->BarChart('TotalFuncionario', $totais, [
			// 'title' => 'Movimentações por Funcionário',
			'legend' => [
				'position' => 'none'
			]
		]);

		// Por Departamento
		$totais2 = $lavaGraf1->DataTable();
		$totais2->addStringColumn('Departamento')->addNumberColumn('Total (R$)');
		foreach ($porDepartamento as $departamento => $soma) {
			$totais2->addRow([$departamento, (float) $soma]);
		}

		$lavaGraf1->DonutChart('TotalDepartamento', $totais2, [
			// 'title' => 'Movimentações por Departamento',
			'legend' => [
				'position' => 'left'
			]
		]);

		// dd($totais2);

		return view('painel.painel',compact('lavaGraf1'));
	}
}
