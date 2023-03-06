<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{

    public static $wrap = 'post';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'body'=>$this->resource->body,
            'excerpt'=>$this->resource->excerpt,
            'slug'=>$this->resource->slug,
            'user'=>new UserResource($this->resource->user),
        ];
    }
}
