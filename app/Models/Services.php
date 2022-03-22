<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'code',
        'service',
        'created_at',
        'updated_at'
    ];
}
