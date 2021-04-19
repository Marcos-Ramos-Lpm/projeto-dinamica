<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente')->insert([
            'nome' => 'Marcos ramos de almeida',
            'data_nascimento' => '1988-12-27',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
