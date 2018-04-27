<?php
namespace Modules\License\Repositories\License;

use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepositoryInterface;
use Modules\License\Entities\License;

class LicenseRepository implements LicenseRepositoryInterface
{
    protected $license;

    function __construct(License $license){

        $this->license = $license;
    }


    public function findAll(){
        return $this->license->findAll();
    }

    public function find($id){
        return $this->license->findLicense($id);
    }


    public function delete($id){

        return $this->license->deleteUser($id);
    }

    public function store($id, array $input){

        return $this->license->delete($id);
    }

    public function create(array $data){
        // TODO: Implement create() method.
    }

    public function update($id, array $data){
        // TODO: Implement update() method.
        return $this->license->edit($id, $data);
    }

    public function getTotalLicenses($status){
        return $this->license->getTotalLicenses($status);
    }

    public function getLicensesStats(){
        $license_stats = [];
         foreach(License::statuses as $key=>$val){
             $license_stats[$val] = $this->license->getTotalLicenses($key);
         }
         return $license_stats;
    }
}