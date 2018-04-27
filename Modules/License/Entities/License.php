<?php

namespace Modules\License\Entities;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable = [
        'number',
        'name',
        'subscription_date',
        'expiry_date',
        'status',
        'state_id',
    ];
    protected $table = 'license';
    public $timestamps = true;
    const LICENSE_MISSING = 0;
    const LICENSE_ACTIVE = 1;
    const LICENSE_REVOKED = 2;
    const LICENSE_INVALID = 3;
    const LICENSE_VALID = 4;
    const LICENSE_EXPIRED = 5;
    const LICENSE_EXPIRING_SOON = 6;

    const EXPIRATION_DAYS_NOTICE = 30;


    const statuses = [
        self::LICENSE_MISSING =>'No License Found',
        self::LICENSE_ACTIVE =>'License Active',
        self::LICENSE_REVOKED =>'License Revoked',
        self::LICENSE_INVALID =>'License Invalid',
        self::LICENSE_VALID =>'License Valid',
        self::LICENSE_EXPIRED =>'License Expired',
        self::LICENSE_EXPIRING_SOON =>'License Expiring Soon'
    ];

    public function state(){
        return $this->belongsTo('\Modules\License\Entities\States');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(){
        return static::all();
    }

    public function getStatusAttribute($status){
        return self::statuses[$status];
    }

    public function findLicense($id){
        return static::find($id);
    }


    public function RevokeLicense($id){

        $license = License::where('id', $id)->update('status',self::LICENSE_REVOKED);
        if($license){
            return true;
        }
        return false;
//
//        $license = static::find($id);
//        if($license){
//            $license->statuse = self::LICENSE_REVOKED;
//            if($license->save()){
//                return true;
//            }
//            return false;
//        }
//        return false;

    }

    public function getTotalLicenses($status){
        $licenses_total  = License::where('status', $status)->get()->count();
        return $licenses_total ?? 0;
    }

    public function edit($id,$data)
    {
        $license = License::where('id', $id)->update($data);
        if($license){
            return true;
        }
        return false;
    }

}
