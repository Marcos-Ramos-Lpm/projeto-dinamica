<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'categoria_id';
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
