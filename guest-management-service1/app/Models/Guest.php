<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'country',
    ];

    use HasFactory;
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guest) {
            if (empty($guest->country)) {
                $guest->country = self::determineCountry($guest->phone);
            }
        });
    }

    public static function determineCountry($phone)
    {

        $phone = preg_replace('/\D/', '', $phone);

        foreach (Countries::countryCodes as $code => $country) {
            if (strpos($phone, $code) === 0) {
                return $country;
            }
        }
        return 'Unknown';
    }
}
