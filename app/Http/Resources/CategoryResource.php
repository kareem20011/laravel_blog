<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'parent'=>$this->parent,
            'title'=>$this->title,
            'content'=>$this->content,
            'image'=>asset($this->image),
            'created_at'=>$this->created_at->format('y-m-d'),
            'updated_at'=>$this->updated_at->format('y-m-d'),
            'children'=>CategoryCollection::make($this->whenLoaded('children')),

        ];
    }
}
