<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    

    public function scopeFilter($query, $search)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
            
        }
    }

 

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
