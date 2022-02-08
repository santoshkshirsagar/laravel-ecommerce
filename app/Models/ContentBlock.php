<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function inputs()
    {
        return $this->hasMany(ContentInput::class);
    }
    public function components()
    {
        return $this->hasMany(ContentComponent::class);
    }
}
