<?php

namespace Modules\License\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\License\Repositories\MailList\MailListRepositoryInterface as MailListRepoInterface;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
/** Todo: Depending on how big this feature gets; refactor into a module */
class SettingsController extends Controller
{

    private $licenseRepo;
    private $mailListRepo;

    public function __construct(LicenseRepoInterface $licenseRepository,
                                MailListRepoInterface $MailListRepository)
    {
        $this->licenseRepo = $licenseRepository;
        $this->mailListRepo =  $MailListRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $mailing_list  = $this->mailListRepo->findAll();
        if($mailing_list){
            return view('license::settings.main',['mailing_list'=>$mailing_list]);
        }
        return view('license::settings');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('license::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showEmail($id)
    {
        $mail = $this->mailListRepo->find($id);
        if(!$mail->isEmpty()){
            return view('license::settings.update',['mail'=>$mail[0]]);
        }
        flash('An Error Occurred')->warning();
        return redirect()->route('settings');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('license::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    /**
     * Add new email to mailing list
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addEmail(Request $request){
        $post_data = $request->post();
        if(!empty($post_data)){
            try{
                $new_mail = $this->mailListRepo->addMail($post_data);
                if($new_mail){
                    flash('Email Address Added successfully To Admin Mailing List' )->success();
                    return redirect()->route('settings');
                }
            }catch (\ErrorException $ex){

                Log::error("Mail Addition operation failed with the Exception:",[$ex->getMessage()]);
                flash('An Error Occurred')->error();
                return redirect()->route('settings');
            }catch( QueryException $ex){

                Log::error("Email update operation failed with an Exception:",['message'=>$ex->getMessage()]);
                flash('Email address already exists,Please Input a unique email address')->error();
                return redirect()->route('settings');
            }
        }
        flash('An Error Occurred! Please try again')->error();
        return redirect()->route('settings');
    }

    /**
     * Remove specific email from mailing list
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeEmail($id){
        if(isset($id)){
            try{
                $status = $this->mailListRepo->delete($id);
                if($status){
                    /** refactor response all through the app in Lang module, to enable auto-language translation */
                    flash('Mail Successfully Removed')->success();
                    return redirect()->route('settings');
                }
            }catch (\ErrorException $ex){

                Log::error("Mail Removal operation failed with the Exception:",[$ex->getMessage()]);
                flash('An Error Occurred Could Not Remove Mail')->error();
                return redirect()->route('settings');
            }
        }
        flash('An Error Occurred Could Not Remove Mail: No Data Passed')->error();
        return redirect()->route('settings');

    }

    public function editEmail($id,Request $request){
        $post_data = $request->post();

        unset($post_data['_token']);
        if(!empty($post_data)){
            try{
                $status = $this->mailListRepo->update($id,$post_data);
                if(!$status){
                    flash('Email Info Update Failed ')->error();
                    return redirect()->route('settings');
                }
                flash('Email Info Updated Successfully ')->success();
                return redirect()->route('settings');
            }catch (\ErrorException $ex){

                Log::error("Email update operation failed with an Exception:",['message'=>$ex->getMessage()]);
                flash('Email update operation failed')->error();
                return redirect()->route('settings');
            }catch( QueryException $ex){

                Log::error("Email update operation failed with an Exception:",['message'=>$ex->getMessage()]);
                flash('Email address already exists,Please Input a unique email address')->error();
                return redirect()->route('settings');
            }

        }
        flash('An error occurred')->warning();
        return redirect()->route('settings');
    }
}
