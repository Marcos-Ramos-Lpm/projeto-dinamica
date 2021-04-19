<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produto')->insert([
            'categoria_id' => 1,
            'produto' => 'Enchada',
            'valor_produto' => '37.50',
            'descricao' => 'Enchada de aço inox',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
