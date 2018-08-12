<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('departamentos')->insert([
    		'name' => 'Financeiro' , 'created_at' => date('Y-m-d H:i:s') , 'updated_at' => date('Y-m-d H:i:s')
    	]);
    	DB::table('departamentos')->insert([
    		'name' => 'Operacional' , 'created_at' => date('Y-m-d H:i:s') , 'updated_at' => date('Y-m-d H:i:s')
    	]);
    	DB::table('departamentos')->insert([
    		'name' => 'Departamento Pessoal' , 'created_at' => date('Y-m-d H:i:s') , 'updated_at' => date('Y-m-d H:i:s')
    	]);
    	DB::table('departamentos')->insert([
    		'name' => 'Logística' , 'created_at' => date('Y-m-d H:i:s') , 'updated_at' => date('Y-m-d H:i:s')
    	]);
    }
}
