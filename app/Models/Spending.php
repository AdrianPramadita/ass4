<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'date_spending',
    //     'total',
    //     'resource_id '
    // ];
    protected $guarded = [];

    public function resources()
    {
        // Resource::with(['resources', function($query)
        // {
        //     $query->select('name_resource');
        // }])->get();
    
        
        return $this->belongsTo('App\Models\Resource', 'resource_id');
    }

}
