<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scraperSocial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function data()
    {
        return $this->belongsTo(Data::class, 'company_id');
    }
}
