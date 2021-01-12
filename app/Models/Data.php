<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    const SOCIAL = [
        'no' => 'NO',
        'yes' => 'YES',
    ];

    protected $fillable = ['company_id', 'company', 'url', 'phone', 'email', 'social', 'padlock', 'predictions'];

//    public function company()
//    {
//        return $this->belongsTo(Data::class, 'id');
//    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'company_id');
    }

    public function emails()
    {
        return $this->hasMany(scraperEmails::class, 'company_id');
    }

    public function socials()
    {
        return $this->hasMany(scraperSocial::class, 'company_id');
    }

}
