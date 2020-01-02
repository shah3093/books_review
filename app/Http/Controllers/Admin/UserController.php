<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\CommonFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $data['users'] = $user->getAll();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'regex:/^[+]\d+$/|nullable',
            'status' => 'required',
            'user_type' => 'required'
        ]);

        $random_password = CommonFunction::generateRandomString(8);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'user_type' => $request->input('user_type'),
            'address' => $request->input('address'),
            'details' => $request->input('details'),
            'password' => bcrypt($random_password)
        ];

        $user = new User();
        $userObj = $user->storeData($data);

        if (!empty($userObj)) {

            //Sending Email
            $email_data = [
                'name' => $userObj['name'],
                'user_type' => CommonFunction::getUserType($userObj['user_type']),
                'password' => $random_password
            ];
            $email_subject = "You have been added to " . Config::get('constants.app.APP_NAME');
            $to = $userObj['email'];
            $template = 'admin.emails.users.create';
            $this->sendEmail($email_data, $to, $email_subject, $template);

            CommonFunction::flash('User successfully created', 'success');
            return redirect()->route('user');
        } else {
            CommonFunction::flash('User creation failed', 'danger');
            return redirect()->back();
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);

        if (!empty($data['user'])) {
            return view('admin.user.edit', $data);
        } else {
            CommonFunction::flash('User not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'regex:/^[+]\d+$/|nullable',
            'status' => 'required',
            'user_type' => 'required'
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'user_type' => $request->input('user_type'),
            'address' => $request->input('address'),
            'details' => $request->input('details')
        ];

        $user = new User();
        $status = $user->updateData($id, $data);
        if ($status == 100) {
            CommonFunction::flash('User successfully updated', 'success');
            return redirect()->route('user');
        } else {
            CommonFunction::flash('User not found', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new User();
        $status = $user->deleteData($id);
        if ($status == 100) {
            CommonFunction::flash('User successfully updated', 'success');
            return redirect()->route('user');
        } else if ($status == 2) {
            CommonFunction::flash('User not found', 'danger');
            return redirect()->back();
        } else if ($status == 3) {
            CommonFunction::flash('You can delete yourself', 'danger');
            return redirect()->back();
        } else {
            CommonFunction::flash('Unknown error', 'danger');
            return redirect()->back();
        }
    }
}
