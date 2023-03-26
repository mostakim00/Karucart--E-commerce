<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.role.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_name' =>  'required'
        ]);
        $role = new Role();
        $role->role_name = $request->role_name;
        $role->role_comments = $request->role_comments;
        $role->save();
        $notification = array(
            'message' => 'Role Create Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role_name' =>  'required'
        ]);
        $role = Role::where('id', $id)->first();
        $role->role_name = $request->role_name;
        $role->role_comments = $request->role_comments;
        $role->update();
        $notification = array(
            'message' => 'Role Update Successfully!',
        ); // returns Notification,
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $delete = Role::where('id', $id)->delete();

        $notification = array(
            'message' => 'Role Delete Successfully!',
        ); // returns Notification,
        return redirect()->back()->with($notification);
    }
}
