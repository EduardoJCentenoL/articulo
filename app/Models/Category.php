<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mockery\Matcher\Not;

class Category extends Model
{
    protected $fillable = [
        'name', 'description'];

    public function note() : HasMany {
        return $this -> hasMany(Note::class);
    }
}
