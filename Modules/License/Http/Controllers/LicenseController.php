<?php

namespace Modules\License\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\License\Entities\States;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;
use Illuminate\Support\Facades\Log;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;

class LicenseController extends Controller
{
    private $licenseRepo;

    public function __construct(LicenseRepoInterface $licenseRepository)
    {
        $this->licenseRepo = $licenseRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $licenses  = $this->licenseRepo->findAll();
        if($licenses){
            return view('license::index',['licenses'=>$licenses]);
        }
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
    public function show($id)
    {
        $license = $this->licenseRepo->find($id);
        //change this to repository controls
        $states = States::all();

        return view('license::update',['id'=>$id,'license'=>$license, 'states'=>$states]);
    }

    /**
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
                flash('Task successfully added!')->success();
                return redirect()->route('user');
            }catch (\ErrorException $ex){
                Log::error("update failed with Exception:",$ex->getMessage());
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
        return null;
    }

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
}
