<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index(){

		return view('user.index');
	}

	public function store(Request $request)
    {
       
        $user = new User();
        $user->name = $request->name;
		$user->company = $request->company;
		$user->url = $request->url;
		$user->repos = $request->repos;


        if ($user->save()) {
            return $this->apiResponse('ok', 'User successfully saved', $user, 200);
        }
	}

	public function getUsers(){
		$users = User::latest()->get();
        return $this->apiResponse('ok', 'Users retrieved successfully', $users, 200);
	}

	public function edit(Request $request){
		$id = $request->route('id');
		return view('user.edit', ['id'=> $id]);
	}

	public function indexById($id)
    {
        $user = User::find($id);
		return response()->json($user);
    }

	public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
			'company' => ['required'],
			'url' => ['required'],
			'repos' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->apiResponse('error', 'Validation Error', $validator->errors(), 400);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->company = $request->company;
        $user->url = $request->url;
        $user->repos = $request->repos;
        $user->save();

        return $this->apiResponse('ok', 'User has been updated successfully.', $user, 200);
    }
}
