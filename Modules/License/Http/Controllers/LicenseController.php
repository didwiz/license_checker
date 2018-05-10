<?php

namespace Modules\License\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\License\Entities\License;
use Modules\License\Entities\States;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;
use Modules\License\Repositories\MailList\MailListRepositoryInterface as MailListRepoInterface;
use Illuminate\Support\Facades\Log;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class LicenseController extends Controller
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
    public function index(){
        $licenses  = $this->licenseRepo->paginateResults(License::DEFAULT_PAGES);
        if($licenses){
            return view('license::index',['licenses'=>$licenses]);
        }
        flash('No Available License')->error();
        return view('license::missing_license');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $states = States::all();

        return view('license::create',['states'=>$states]);
    }

    /**
     * Store a newly created License in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->post();
        unset($data['_token']);
        if(!empty($data)){
            try{
                $this->licenseRepo->createLicense($data);
                flash('New License Created!')->success();
                return redirect()->route('user');
            }catch (\ErrorException $ex){
                Log::error("Operation failed with Exception:",[$ex->getMessage()]);
                flash('An error Occurred')->warning();
                return redirect()->route('create');
            }catch(QueryException $ex){
                Log::error("Operation failed with Exception:",[$ex->getMessage()]);
                flash('An error Occurred: EXISTING LICENSE NUMBER ENTERED')->warning();
                return redirect()->route('create');
            }
        }
        flash('An error occurred')->warning();
        return redirect()->route('create');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $license = $this->licenseRepo->find($id);
        /** TODO: change this to repository pattern  */
        $states = States::all();

        return view('license::update',['id'=>$id,'license'=>$license, 'states'=>$states, 'status'=>License::statuses]);
    }

    /**
     * Update License Controller Action
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id,Request $request)
    {
        $data = $request->post();

        unset($data['_token']);
        if(!empty($data)){
            try{
                $this->licenseRepo->update($id,$data);
                flash('License successfully Updated!')->success();
                return redirect()->route('user');
            }catch (\ErrorException $ex){
                Log::error("update failed with Exception:",[$ex->getMessage()]);
                return redirect()->route('license');
            }
        }
        flash('An error occurred')->warning();
        return redirect()->route('license');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
        /** Todo implement soft delete License */
        return null;
    }

    /**
     * Send Email Report to specified email
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendReport(Request $request){
        $data = $request->post();
        if(!empty($data)){
            //limit report sent to only 10 license info for now
            $licenses  = $this->licenseRepo->findAll();
            if(!empty($licenses)){
                $details = $licenses;
                Mail::to($data['email'])->send(new Notification($details));
                    flash('Report sent successfully to '.$data['email'])->success();
                    return redirect()->route('user');
            }
        }
        flash('An Error Occurred! Please try again')->error();
        return redirect()->route('user');
    }

    /**
     * Action to revoke license
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function revokeLicense($id){

        if(isset($id)){
            try{
                $status = $this->licenseRepo->revokeLicense($id);
                if($status){
                    flash('License Successfully Revoked')->success();
                    return redirect()->route('user');
                }
            }catch (\ErrorException $ex){
                Log::error("update failed with Exception:",[$ex->getMessage()]);
                flash('Could Not Revoke License')->error();
                return redirect()->route('user');
            }
        }
        flash('Could Not Revoke License, No data passed')->error();
        return redirect()->route('user');
    }
}
