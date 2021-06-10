<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Inventory extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'gmdn',
        'region',
        'hospital',
        'equipmentName',
        'equipmentType',
        'modelName',
        'serialNumber',
        'class',
        'department',
        'manufacturer',
        'currentStatus',
        'installationDate',
        'warranty',
        'warrantyExpirationDate',
        'agent',
        'hmc',
        'numberOfInspectionAnnualy',
        'firstScheduledPPM',
        'fileUpload',
        'comments',
    ];

    public function getDepartment()
    {
        return $this->belongsTo(Departments::class, 'department');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region');
    }

    public function getHospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital');
    }

    public function getEquipment()
    {
        return $this->belongsTo(MedicalEquipment::class, 'equipmentName');
    }
}
