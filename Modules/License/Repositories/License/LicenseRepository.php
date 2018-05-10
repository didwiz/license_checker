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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(){
        return $this->license->findAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find($id){
        return $this->license->findLicense($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete($id){

        return $this->license->deleteUser($id);
    }

    /**
     * @param int $id
     * @param array $input
     * @return bool|null
     */
    public function store($id, array $input){

        return $this->license->delete($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createLicense(array $data){
        // TODO: Implement create() method.
        return $this->license->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data){
        // TODO: Implement update() method.
        return $this->license->edit($id, $data);
    }

    /**
     * Retrieve total licenses based on status
     * @param $status
     * @return int
     */
    public function getTotalLicenses($status){
        return $this->license->getTotalLicenses($status);
    }

    /**
     * Retrieve License stats to load dashboard
     * @return array
     */
    public function getLicensesStats(){
        $license_stats = [];
         foreach(License::statuses as $key=>$val){
             $license_stats[$val] = $this->license->getTotalLicenses($key);
         }
         return $license_stats;
    }

    /**
     * Revoke license
     * @param $id
     * @return bool
     */
    public function revokeLicense($id){
        return $this->license->revokeLicense($id);
    }

    /**
     * @param $pages
     * @return mixed
     */
    public function paginateResults($pages){
        return $this->license->paginate($pages);
    }

    /**
     * @return mixed
     */
    public function downloadCSV(){
        return $this->license->downloadCSV();
    }
}