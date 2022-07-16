<?php

namespace App\Models;

use App\Models\Scopes\LastWeekScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // protected static function booted()
    // {
    //     static::addGlobalScope(new LastWeekScope());
    // }

    //Scope
    public function scopeBest(Builder $query): Builder
    {
        return $query
            ->with('genre')
            ->where('score', '>', 9)
            ->orderBy('score', 'desc');
    }
}
