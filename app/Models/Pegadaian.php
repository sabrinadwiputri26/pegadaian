<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class pegadaian extends Model
{
    use HasFactory;
    protected $tables = 'pegadaians';
    protected $fillable = [
    'nik',
    'nama',
    'no',
    'pegadaian',
    'foto',
];

public function response()
{
    return $this->hasOne
    (Response::class);
}
}
