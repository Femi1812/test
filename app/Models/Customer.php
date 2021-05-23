<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function format(){
        return [
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'status' => $this->active,
            'date' => $this->updated_at->diffForHumans()
        ];
    }
    public function user(){

       return $this->belongsTo(User::class);
    }
}
