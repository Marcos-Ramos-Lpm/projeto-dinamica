<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $fillable = ['descricao', 'valor_produto', 'categoria_id', 'produto_id'];
    protected $primaryKey = 'produto_id';
    public $timestamps = true;

    public function categoria()
    {
        $result = $this->hasOne(CategoriaProduto::class, 'id', $this->primaryKey);

        return $result;
    }
   
}
