<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    protected UserService $userService;

    public function __construct (UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index ()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show (string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request , string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (string $id)
    {
        //
    }

    public function login (Request $request)
    {
        try {
            $response = $this->userService->login($request);
        } catch ( \Exception $e ) {
            return back()->withErrors([ 'email' => $e->getMessage() ]);
        }

        if ( $response[ 'status' ] ) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([ 'email' => $response[ 'error' ] ]);

    }

    public function logout (Request $request) {

        $this->userService->logout($request);
        return redirect('/');
    }
}
