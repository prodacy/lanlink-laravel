<?php

use Illuminate\Database\Seeder;

class DepartamentoFuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <= 3; $i++) { 
    		DB::table('departamento_funcionario')->insert([
    			'funcionario_id' => $i ,'departamento_id' => mt_rand(1,4)
    		]);
    	}

    }
}
