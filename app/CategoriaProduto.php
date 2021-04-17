<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    protected $table = 'categoria_produto';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'categoria'
    ];
    public function produto()
    {
        $result = $this->hasOne(Produto::class, 'categoria_id', $this->primaryKey);

        return $result;
    }
}
