<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = ['id']; // this allows us to mass assign all values to tickets table except the id field.
    
    /*
    * Cast the location object to array and stringfy it with json_encode
    */
    protected $casts = [
        'captured_location' => 'array'
    ]; 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
