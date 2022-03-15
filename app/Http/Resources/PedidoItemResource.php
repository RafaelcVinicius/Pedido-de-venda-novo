<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_item' => $this->id,
            'id' => $this->id_produto,
            'valor'=> $this->valor,
            'nome'=>$this->produto->nome,
            'qtde'=>$this->qtde,
            'codbarras'=>$this->produto->codbarras,
            'acrescimo'=>$this->percacrescimo,
            'desconto'=>$this->percdesconto,
        ];
    }
}
