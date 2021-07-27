<?php

namespace ByusTechnology\Gabinete\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FullCalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->titulo,
            'start' => $this->inicio_em->toIso8601String(),
            'end' => $this->termino_em->toIso8601String(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}