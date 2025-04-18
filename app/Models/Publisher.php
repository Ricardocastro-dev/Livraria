<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Book;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Permite atribuição em massa no campo "name"
    
    public $timestamps = false; // Remove os campos "created_at" e "updated_at" (opcional)
    //
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
