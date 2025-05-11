<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *   schema="Card",
 *   type="object",
 *   title="Card",
 *   @OA\Property(property="id",            type="integer"),
 *   @OA\Property(property="title",         type="string"),
 *   @OA\Property(property="description",   type="string", nullable=true),
 *   @OA\Property(property="image",         type="string", nullable=true),
 *   @OA\Property(property="created_at",    type="string", format="date-time"),
 *   @OA\Property(property="updated_at",    type="string", format="date-time")
 * )
 */

class Card extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'music',
        'video',
        'card_size_id',
        'category_id',
        'user_id',
    ];

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function size()
    {
        return $this->belongsTo(CardSize::class, 'card_size_id');
    }
}
