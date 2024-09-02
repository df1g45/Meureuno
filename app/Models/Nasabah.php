<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;
    private $tabungan;
    public function __construct(Tabungan $tabungan)
    {
        $this->tabungan = $tabungan;
    }

    public function lihatSaldo()
    {
        return $this->tabungan->checkSaldo();
    }
}
