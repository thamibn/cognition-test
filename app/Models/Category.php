<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id']; // this allows us to mass assign all values to categories table except the id fields
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
