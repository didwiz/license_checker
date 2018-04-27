<?php
/**
 * Created by PhpStorm.
 * User: didiwz
 * Date: 4/26/18
 * Time: 6:30 PM
 */

namespace Modules\License\Repositories\License;


interface LicenseRepositoryInterface
{
    /**
     * Returns all the license entries.
     *
     * @return \Modules\License\Entities\License
     */
    public function findAll();

    /**
     * Returns a auth entry by its primary key.
     *
     * @param  int  $id
     * @return \Modules\License\Entities\License
     */
    public function find($id);

    /**
     * Creates or updates the given license.
     *
     * @param  int  $id
     * @param  array  $input
     * @return bool|array
     */
    public function store($id, array $input);

    /**
     * Creates a license entry with the given data.
     *
     * @param  array  $data
     * @return \Modules\License\Entities\License
     */
    public function createLicense(array $data);

    /**
     * Updates the license entry with the given data.
     *
     * @param  int  $id
     * @param  array  $data
     * @return \Modules\License\Entities\License
     */
    public function update($id, array $data);

    /**
     * Deletes the license entry.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete($id);

    public function getTotalLicenses($status);

    public function getLicensesStats();

}