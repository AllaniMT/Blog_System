<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request); // If we want to return everything ("Created_at", "updated_at")
        return [
            'id' => $this->id,
            'title' =>$this->title,
            'body' => $this->body

        ];
    }

    public function with($request){
        return[
            'version' => '2.0.0',
            'auhor_url'=>url('https://www.mohamed-tayeb-allani.com/')
        ];
    }
}
