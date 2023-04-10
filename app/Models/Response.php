<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegadaian;

class Response extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegadaian_id',
        'status',
        'pesan',
    ];

    public function Pegadaian()
{
    return $this->belongsTo
    (Pegadaian::class);
}
}
