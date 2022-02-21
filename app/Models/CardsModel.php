<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardsModel extends Model
{
    use HasFactory;
    protected $table = 'cards';

    public static function getCardInfo($card_uuid) {
        return self::where('id', $card_uuid)->with('customer')->with('facility')->first();
    }

    public function customer()
    {
        return $this->hasOne(CustomerModel::class, 'id', 'user_id');
    }

    public function facility()
    {
        return $this->hasOne(FacilitiesModel::class, 'id', 'object_uuid');
    }

}
