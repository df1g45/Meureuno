<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    private $saldo;
    public function __construct($saldo = 1000)
    {
        $this->saldo  = $saldo;
    }
    public function checkSaldo()
    {
        return $this->saldo;
    }
}
