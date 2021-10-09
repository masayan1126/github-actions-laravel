<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $fillable = ['user_id', 'name'];

    // public function toDomain(): Stock
    // {
    // }

    public function user()
    {
        return $this->hasMany(ModelUser::class);
    }
}
