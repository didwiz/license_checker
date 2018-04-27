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

    /**
     * 1:1 relationship between licenses and states
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){
        return $this->belongsTo('\Modules\License\Entities\States');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(){
        return static::all();
    }

    /**
     * This converts the status attribute from a number to the appropriate status name
     * @param $status
     * @return mixed
     */
    public function getStatusAttribute($status){
        return self::statuses[$status];
    }

    /**
     * Returns one License based on a given ID
     * @param $id
     * @return mixed
     */
    public function findLicense($id){
        return static::find($id);
    }

    /**
     * Create new License from an array of data
     * @param array $data
     * @return mixed
     */
    public function createLicense(array $data){
        return static::create($data);
    }

    /**
     * Revoke License based on given license ID
     * @param $id
     * @return bool
     */
    public function revokeLicense($id){

        $license = License::where('id', $id)->update(['status'=>self::LICENSE_REVOKED]);
        if($license){
            return true;
        }
        return false;
    }

    /**
     *  Retrieve total number of licenses available based on status
     * @param $status
     * @return int
     */
    public function getTotalLicenses($status){
        $licenses_total  = License::where('status', $status)->get()->count();
        return $licenses_total ?? 0;
    }

    /**
     *  Update given license
     * @param $id
     * @param $data
     * @return bool
     */
    public function edit($id,$data)
    {
        $license = License::where('id', $id)->update($data);
        if($license){
            return true;
        }
        return false;
    }

}
