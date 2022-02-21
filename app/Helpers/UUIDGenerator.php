<?php


namespace App\Helpers;
use Illuminate\Support\Str;


class UUIDGenerator
{
    public static function generate()
    {
        return Str::uuid()->getHex();
    }
}
