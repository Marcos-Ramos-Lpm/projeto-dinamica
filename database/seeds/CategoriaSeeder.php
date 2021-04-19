<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            'categoria' => 'Ferramentas',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
