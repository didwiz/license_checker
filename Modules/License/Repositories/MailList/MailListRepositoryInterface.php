<?php
/**
 * Created by PhpStorm.
 * User: didiwz
 * Date: 4/26/18
 * Time: 6:30 PM
 */

namespace Modules\License\Repositories\MailList;


interface MailListRepositoryInterface
{
    /**
     * Returns all the mailListentries.
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
     * Creates a mailListentry with the given data.
     *
     * @param  array  $data
     * @return \Modules\License\Entities\License
     */
    public function addMail(array $data);

    /**
     * Updates the mailList entry with the given data.
     *
     * @param  int  $id
     * @param  array  $data
     * @return \Modules\License\Entities\License
     */
    public function update($id, array $data);

    /**
     * Deletes the mailListentry.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete($id);



}