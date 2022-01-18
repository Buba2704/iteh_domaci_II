<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PozajmicaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='pozajmica';
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'datum'=>$this->resource->datum,
            'knjiga'=>new KnjigaResource($this->resource->knjiga),
            'clan'=>new ClanResource($this->resource->clan),
            'napomena'=>$this->resource->napomena
        ];
    }
}
