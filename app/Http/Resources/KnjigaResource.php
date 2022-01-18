<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='knjiga';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'naziv'=>$this->resource->naziv,
            'pisac'=>$this->resource->pisac,
            'zanr'=>$this->resource->zanr,
            'opis'=>$this->resource->opis,
            'datumIzdavanja'=>$this->resource->datumIzdavanja,
        ];
    }
}
