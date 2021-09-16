<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $hidden = ['updated_at','created_at'];

    protected $fillable = [
        'date_income',
        'name_product',
        'quantity',
        'total',
        'resource_id'
        
    ];

    public function resources()
    {
        // Resource::with(['resources', function($query)
        // {
        //     $query->select('name_resource');
        // }])->get();
    
        
        return $this->belongsTo('App\Models\Resource', 'resource_id');
    }
}
