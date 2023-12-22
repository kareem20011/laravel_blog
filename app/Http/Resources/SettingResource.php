<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'logo'=>asset($this->logo),
            'favicon'=>asset($this->favicon),
            'facebook'=>$this->facebook,
            'instagram'=>$this->instagram,
            'email'=>$this->email,
            'created_at'=>$this->created_at->format('Y-d-m'),
            'updated_at'=>$this->updated_at->format('Y-d-m'),
        ];

    }
}
