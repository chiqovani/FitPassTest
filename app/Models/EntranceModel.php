<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceModel extends Model
{
    protected $table = 'entrance';
    use HasFactory;

    public static function store(array $params) {
        return EntranceModel::insert($params);
    }

    public static function checkEntrance(array $params) {
        $date = Carbon::now()->format('Y-m-d');
        $entry = EntranceModel::where('facility_uuid', $params['object_uuid'])
            ->where('card_uuid',$params['card_uuid'])->where('entrance_date', $date)->first();
        return !(($entry == null));
    }
}
