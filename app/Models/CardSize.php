<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardSize extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'width', 'height'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
