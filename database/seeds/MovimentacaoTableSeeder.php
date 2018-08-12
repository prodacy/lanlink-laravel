<?php

use Illuminate\Database\Seeder;

class MovimentacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$tipoMovimentacao = ['Pagamento de Terceiro','Compra de Material','Aquisição de Equipamento','Custo Benefício'];

    	for ($i=0; $i < 50; $i++) { 
    		DB::table('movimentacoes')->insert([
    			'valor' => number_format((rand(1,1000)/100),2,'.',''),
    			'departamento_id' => mt_rand(1,4), 
    			'funcionario_id' => mt_rand(1,3), 
    			'descricao' => $tipoMovimentacao[mt_rand(0,3)], 
    			'created_at' => date('Y-m-d H:i:s'), 
    			'updated_at' => date('Y-m-d H:i:s')
    		]);
    	}
    }
}
