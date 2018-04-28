<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;

class UserController extends Controller
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
    public function index(){
        $licenses  = $this->licenseRepo->findAll();
        $licenses_stats = $this->licenseRepo->getLicensesStats();
        if($licenses) {
            return view('user::dashboard', ['licenses' => $licenses,'licenses_stat'=>$licenses_stats]);
        }
        flash('No Available License(s) Found')->error();
        return view('license::missing_license');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(){
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request){
        // stub
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(){
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(){
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        //stub
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
        //stub
    }
}
