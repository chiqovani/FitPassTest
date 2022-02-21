<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitiesModel extends Model
{
    use HasFactory;
    protected $table = 'facilities';
    public $incrementing = false;
    protected $keyType = 'uuid';
}
