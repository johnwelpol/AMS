<?php

namespace App\Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use App\Modules\Authentication\Model\User;

class UserController extends Controller
{
    private $request;
    private $response;
    private $role;


    public function __construct(Request $request, Response $response, Role $role)
    {
        $this->request = $request;
        $this->response = $response;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $user = new User;
        return $user->all();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(){

    }

    public function addLandLord(UserRequest $request)
    {
        $role = $this->role->find(2);
        $user = User::create($request->all());
        $user->assignRole($role);

        //put an email here 

        return $user;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(User $user)
    {
        //
        // $user->roles();
        return $user->roles();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UserRequest $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
