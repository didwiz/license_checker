<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\License\Repositories\License\LicenseRepositoryInterface as LicenseRepoInterface;
use Modules\License\Entities\License;
use Modules\User\Entities\User;

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
    public function index()
    {
        $licenses = $this->licenseRepo->paginateResults(License::DEFAULT_PAGES);
        $licenses_stats = $this->licenseRepo->getLicensesStats();
        if ($licenses) {
            return view('user::dashboard', ['licenses' => $licenses, 'licenses_stat' => $licenses_stats]);
        }
        flash('No Available License(s) Found')->error();
        return view('license::missing_license');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // stub
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createAdmin()
    {
        return view("user::create");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAdmin(Request $request)
    {
        /**
         * Todo: Ensure to add validation for forms, currently there is no validation in this system!
         */
        $request->validate([

            'name' => 'required|max:255',
            'email' => 'required|e-mail|unique:users',
            'password' => 'required',
        ]);

        $data = $request->post();
        unset($data['_token']);
        if (!empty($data)) {
            try {
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);

                flash('New User Created!')->success();
                return redirect()->route('user');
            } catch (\Exception $ex) {
                Log::error("Operation failed with Exception:", [$ex->getMessage()]);
                flash('An error Occurred')->warning();
                return redirect()->route('create-admin');
            }
        }
        flash('An error occurred')->warning();
        return redirect()->route('create-admin');
    }

    public function showAdmins()
    {

    }
}
