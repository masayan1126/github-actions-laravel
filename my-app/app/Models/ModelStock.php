<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zaico\Domain\Stock\Stock;

class ModelStock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $fillable = [
        'user_id',
        'name',
        'image_url',
        'url',
        'number',
        'expiry_date',
    ];

    // public function toDomain(): Stock
    // {
    // }

    public function user()
    {
        return $this->hasMany(ModelUser::class);
    }

    public function toDomain(): Stock
    {
        $stock = new Stock();

        return $stock
            ->setId($this->id)
            ->setUserId($this->user_id)
            ->setName($this->name)
            ->setImageUrl($this->image_url)
            ->setUrl($this->url)
            ->setNumber($this->number)
            ->setExpiryDate($this->expiry_date);
    }
}
