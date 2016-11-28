<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = \App\User::all();
		
		return view('admin.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $this->validate($request,
        [
            'name' => 'required|unique:users',
            'email'  => 'required|unique:users',
            'password' => 'required',
        
        ]
       
    );
    $string = $request->input('password');
    $password = Hash::make($string);
    $name = $request->input('name');
    $email = $request->input('email');

    User::create(
	    [
		    'name' => $name,
		    'email' => $email,
		    'password' => $password,
	    ]
    );

    return redirect('admin');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::where('id', '=', $id)->firstOrFail();
		
		$super_admin = strval($user["super_user"]);

		return view('admin.edit', ['user' => $user, 'super_admin' => $super_admin]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug, Request $request)
	{
    $user = User::where('id', '=', $slug)->firstOrFail();

    $user->update($request->all());

    return redirect('admin');
	}

	/**
	 * Visar upp specifik användares produkter för superadmin
	 *
	 * 
	 * 
	 */
	public function showUser($id)
	{
    
    $articles = DB::table('articles')->where('creator', '=', $id)->get();
    
    
    return view('admin.userArticles', ['articles' => $articles]);
	}
	
	public function verify()
	{
		$id = $_POST["user_id"];
		$user = User::where('id', '=', $id)->firstOrFail();
		$title = "Edit admins";
		$link = "/admin";
		$secondTitle = $user->name;
		$secondLink = "/admin/$id/edit";
		$action = "AdminController@destroy";
		$parameter = $user->id;
		
		$intro = "This action is permanent. ";
		$middle = "Are you sure you want to delete the admin user ";
		$key = $user->name;
		$end = "?";
		
		return view('verify', compact('user', 'title', 'secondTitle', 'link', 'secondLink', 'action', 'parameter', 'intro', 'middle', 'key', 'end'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $user = User::where('id', '=', $id)->firstOrFail();
		 $user->delete();

		 return redirect('admin');
	}

}
