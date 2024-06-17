<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'description',
        'price',
        'author_id',
        'img_id'
    ];

    public function logo()
    {
        return $this->belongsTo(File::class, 'img_id');
    }

    public function getLogoPathAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->logo->file_name);
        } else {
            return asset('storage/uploads/no-avatar.svg');
        }
    }
}
