<?php

namespace Modules\License\Entities;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model
{
    protected $fillable = ['name','email'];
    protected $table = 'mailing_list';


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(){
        return static::all();
    }

    public function findByEmail($email){
        $mail = MailList::where('email', $email)->get();
        return $mail;

    }

    public function findMail($id){
        return static::where('id', $id)->get();
    }

    public function addMail($data){
        return static::create($data);
    }

    public function edit($id,$data)
    {
        $mail = MailList::where('id', $id)->update($data);
        if($mail){
            return true;
        }
        return false;
    }

    public function deleteMail($id){
        /** refactor this to use soft delete instead */
        return static::destroy($id);
    }
}
