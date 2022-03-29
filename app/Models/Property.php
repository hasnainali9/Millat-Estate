<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\LocationCity;
use App\Models\LocationState;

class Property extends Model
{
    use HasFactory;

    public function category ()
    {
        return $this->BelongsTo(Category::class);
    }

    public function city ()
    {
        return $this->BelongsTo(LocationCity::class);
    }

    public function state ()
    {
        return $this->BelongsTo(LocationState::class);
    }
}
