<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class laptopInventory extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'serialNo',
        'productName',
        'dateOfAquritation',
        'location',
        'condition',
        'user_id',
        'fileUpload',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
