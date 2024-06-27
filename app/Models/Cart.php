<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'baju_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function baju()
    {
        return $this->belongsTo(Baju::class);
    }
}


