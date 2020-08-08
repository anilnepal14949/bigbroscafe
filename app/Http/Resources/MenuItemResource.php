<?php

namespace App\Http\Resources;

use App\Menu;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
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
            'item_name' => $this->item_name,
            'item_description' => $this->item_description,
            'item_price' => $this->item_price,
            'item_image' => $this->item_image,
            'item_order' => $this->item_order,
            'status' => $this->status,
            'menu' => collect($this->menu)->only(['id', 'menu_name'])
        ];
    }
}
