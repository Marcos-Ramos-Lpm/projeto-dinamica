<?php

use App\Categoria;
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
        $categorias = [
            ['categoria' => 'Ferramentas'],
            ['categoria' => 'Hidráulica'],
            ['categoria' => 'Iluminação'],
            ['categoria' => 'Piso e Porcelanato']
        ];
        
        foreach ($categorias as $key => $categoria) {
            Categoria::create($categoria);
        }
    }
}
