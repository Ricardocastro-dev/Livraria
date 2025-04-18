<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Book;

class Sale extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'name', 
        'total_value',
        'quantity', 
        'book_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    // app/Models/Sale.php

    public function publisher()
    {
        return $this->belongsTo(Publisher::class); // Supondo que Sale tenha uma chave estrangeira 'publisher_id'
    }

    public function author()
    {
        return $this->belongsTo(Author::class); // Supondo que Sale tenha uma chave estrangeira 'author_id'
    }
}
