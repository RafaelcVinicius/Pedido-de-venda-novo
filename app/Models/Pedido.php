<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\User;
use App\Models\Itempedido;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primarykey = 'id';
    public $timestamps = true;

    public function cliente(){
            return $this->hasOne(Clientes::class, 'id', 'id_cliente');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_vendedor');
    }

    public function itens(){
        return $this->hasMany(Itempedido::class, 'id_venda', 'id');
    }

    public function getTotalPedidoAttribute() {
        return 1500;
    }
}