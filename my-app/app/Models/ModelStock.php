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

    public function toModel(Stock $stock): ModelStock
    {
        $this->user_id = $stock->getUserId();
        $this->name = $stock->getName();
        $this->image_url = $stock->getImageUrl();
        $this->url = $stock->getUrl();
        $this->number = $stock->getNumber();
        $this->expiry_date = $stock->getExpiryDate();

        // $stock
        //     ->setId($this->id)
        //     ->setUserId($this->user_id)
        //     ->setName($this->name)
        //     ->setImageUrl($this->image_url)
        //     ->setUrl($this->url)
        //     ->setNumber($this->number)
        //     ->setExpiryDate($this->expiry_date);

        return $this;
    }
}
