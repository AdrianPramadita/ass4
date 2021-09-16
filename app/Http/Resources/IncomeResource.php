<?php

namespace App\Http\Resources;

use App\Models\Income;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'date_income' => $this->date_income,
            'name_product' => $this->name_product,
            'quantity' => $this->quantity,
            'total' => $this->total,
            'resource_income' => $this->resources['name_resource'],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'ok'
        ];
    }
}
