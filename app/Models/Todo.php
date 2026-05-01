<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'completed', 'category_id'];

    public function category(): BelongsTo {
      return $this->belongsTo(\App\Models\Category::class);
    }
}
