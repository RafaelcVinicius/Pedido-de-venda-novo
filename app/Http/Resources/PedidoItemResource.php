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
            'valor'=> intval($this->precovenda),
            'nome'=> $this->produto->nome,
            'qtde'=> intval($this->qtde),
            'codbarras'=> intval($this->produto->codbarras),
            'acrescimo'=>intval($this->percacrescimo),
            'desconto'=> intval($this->percdesconto),
        ];
    }
}
