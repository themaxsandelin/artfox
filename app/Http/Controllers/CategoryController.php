<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
		
		return view('category.home', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	            'add_new_category_list' => 'required'
	        ]
	    );
		
		$newcategoriesname = $request->input('add_new_category_list');

		$categories = Category::create(
		[
		   'name' => $newcategoriesname,
		]
		);  
		
		return redirect('category');
	
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
		$category = Category::where('id', '=', $id)->firstOrFail();
		
		return view('category.edit', ['category' => $category]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}
	
	public function verify()
	{
		$id = $_POST["category_id"];
		$category = Category::where('id', '=', $id)->firstOrFail();
		$title = "Edit categories";
		$link = "/category";
		$action = "CategoryController@destroy";
		$parameter = $category->id;
		
		$intro = "This action is permanent. ";
		$middle = "Are you sure you want to delete the category ";
		$key = $category->name;
		$end = "?";
		
		return view('verify', compact('category', 'title', 'link', 'action', 'parameter', 'intro', 'middle', 'key', 'end'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::where('id', '=', $id)->firstOrFail();
	    $category->delete();
	
	    return redirect('category');
	}

}
