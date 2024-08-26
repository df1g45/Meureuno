<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Buku extends Model
{
    use HasFactory;
    use SoftDeletes;


    public $fillable = [
        'judul',
        'deskripsi'
    ];
    protected $table = 'buku';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($buku) {
            $buku->slug = str_replace(' ', '-', $buku->judul);
        });
    }

    public function pendapats()
    {
        return $this->hasMany(Pendapat::class);
    }

    public function hitung()
    {
        return $this->pendapats()->count();
    }

    public function scopeUdep($query)
    {
        return $query->where('udep', '=', true);
    }
}
