<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Inventory extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'serialNo',
        'productName',
        'dateOfAquritation',
        'location',
        'user_id',
        'fileUpload',
        'type',
        'assiningDate',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
