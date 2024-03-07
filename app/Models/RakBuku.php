<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RakBuku extends Model
{
    // use HasFactory;

    protected $table = 'rak_buku';

    public function buku(): HasMany{
        return $this->HasMany(Buku::class, 'id_rak_buku', 'id');
    }
}