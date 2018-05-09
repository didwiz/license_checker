<?php
namespace Modules\License\Repositories\MailList;

use Modules\License\Repositories\MailList\MailListRepositoryInterface;
use Modules\License\Entities\License;
use Modules\License\Entities\MailList;

class MailListRepository implements MailListRepositoryInterface
{
    protected $license;
    protected $mailList;

    function __construct(License $license,MailList $mail_list){

        $this->license = $license;
        $this->mailList = $mail_list;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(){
        return $this->mailList->findAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find($id){
        return $this->mailList->findMail($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete($id){

        return $this->mailList->deleteMail($id);
    }

    /**
     * @param int $id
     * @param array $input
     * @return bool|null
     */
    public function store($id, array $input){

        return $this->mailList->delete($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function addMail(array $data){
        // TODO: Implement create() method.
        return $this->mailList->addMail($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data){
        // TODO: Implement update() method.
        return $this->mailList->edit($id, $data);
    }


}