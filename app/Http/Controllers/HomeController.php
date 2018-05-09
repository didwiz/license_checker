<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;

class HomeController extends Controller
{

    private $licenseRepo;

    /**
     * Create a new controller instance.
     *
     * @param LicenseRepoInterface $licenseRepository
     */

    public function __construct(LicenseRepoInterface $licenseRepository)
    {
        $this->licenseRepo = $licenseRepository;

        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses  = $this->licenseRepo->findAll();
        if($licenses){
            return view('welcome',['licenses'=>$licenses]);
        }
        return view('welcome');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
}