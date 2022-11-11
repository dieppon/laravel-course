<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function hobbies() {
        return $this->belongsToMany('App\Models\Hobby');
    }

    public function filterHobbies() {
        return $this->belongsToMany('App\Models\Hobby')
            ->wherePivot('tag_id', $this->id)
            ->orderBy('updated_at', 'DESC');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'style',
    ];
}
