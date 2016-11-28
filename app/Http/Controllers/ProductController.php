<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$active = false;
		$articles = Article::where(['published' => 1])->get();
		$categories = Category::lists('name', 'id');
		$id = "All";
		$string = null;
		
		$categories[0] = "All Categories";
		
		ksort($categories);
		
		$listValue = array_search($id, $categories);
		
		if (!$listValue) {
			$id = "All";
		}

		
		return view('home', compact('articles'), ['id' => $id, 'categories' => $categories, 'listValue' => $listValue, 'searchValue' => $string, 'active' => $active]);
	}

	public function verify()
	{
		$id = $_POST["article_id"];
		$article = Article::where('id', '=', $id)->firstOrFail();
		$title = "Products";
		$secondTitle = "Edit products";
		$secondLink = "/product/admin";
		$thirdTitle = $article->title;
		$thirdLink = "/product/$id/edit";
		$link = "/product/admin";
		$action = "ProductController@destroy";
		$parameter = $article->id;
		
		$intro = "This action is permanent. ";
		$middle = "Are you sure you want to delete the product ";
		$key = $article->title;
		$end = "?";
		
		return view('verify', compact('article', 'title', 'secondTitle', 'thirdTitle', 'link', 'secondLink', 'thirdLink', 'action', 'parameter', 'intro', 'middle', 'key', 'end'));
	}
	
	public function filterIndex($id)
	{			
		$active = true;
		$string = Input::get('q');
		$cat 	= Input::get('cat');
		$articles = [];
		
		if($cat != 0)
		{

			$catid = Category::where(['id' => $cat])->first();
			
			$id = $catid->name;
			
			$categoryID = Category::where('id', '=', $cat)->first()->id;
			
			// $article_id = DB::table('article_category')->where('category_id', $categoryID)->first();
			$article_id_list = DB::select(DB::raw("SELECT article_id FROM article_category WHERE category_id = '$categoryID'"));
			
			foreach ($article_id_list as $article_id)
			{
				$article_id = $article_id->article_id;
				
				$article = DB::select(DB::raw("SELECT * FROM articles WHERE (id = '$article_id' AND title LIKE '%$string%') OR (id = '$article_id' AND article_number LIKE '%$string%')"));
				
				if ($article) {
					$articles[] = $article[0];
				}
			}
		
		}
		else
		{	
			$articles = DB::select(DB::raw("SELECT * FROM articles WHERE (title LIKE '%$string%') OR (article_number LIKE '%$string%')"));
	    }
			
		$categories = Category::lists('name', 'id');
		
		$categories[0] = "All Categories";
		
		ksort($categories);
		
		$listValue = array_search($id, $categories);
		
		if (!$listValue) {
			$id = "All";
		}
		
		return view('home', ['articles' => $articles, 'id' => $id, 'categories' => $categories, 'listValue' => $listValue, 'searchValue' => $string, 'active' => $active]);
	}
	
	
	// Sökfunktion som tar input från startsidan
	public function search()
	{
		 
		$string = Input::get('q');
				
		$articles = DB::table('articles')
        ->where('title', 'LIKE', "%$string%")
        ->orWhere('article_number', 'LIKE', "%$string%")
        ->get();
        
        return view("product.search", compact('articles'));
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function admin()
	{
		$articles = \App\Article::all();
		
		$searchValue = null;
		
		return view('product.admin', ['articles' => $articles, 'searchValue' => $searchValue]);
	}
	
	// Sökfunktion som tar input på admin-vyn av produkter
	public function searchAdmin()
	{ 
		$string = Input::get('q');
		
		$searchValue = $string;
		
		$articles = Article::where('title', 'LIKE', "%$string%")->orWhere('article_number', 'LIKE', "%$string%")->get();
		        
        return view('product.admin', ['articles' => $articles, 'searchValue' => $searchValue]);

	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$categories = Category::lists('name', 'id');
		
		$listValue = 0;
		
		$categories[0] = "Choose a category";
	    
		ksort($categories);
	    
		$published = array("Unpublished", "Published");
		
		return view('product.create', ['categories' => $categories, 'listValue' => $listValue, 'published' => $published]);
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
	            'title' => 'required',
	            'image'  => 'required',
	            'body' => 'required',
	            'price' => 'required',
	            'category_list' => 'required',
	        ],
	        [
            	'category_list.required' => 'Category has to be choosen.',
			]
	    );
	    
	    $title 		= $request->input('title');
	    $namefile 	= rand(10,2000) . ".png";
		$body		= $request->input('body');
		$price		= $request->input('price');
		$creator	= Auth::user()->id;
		
		$creatorName = User::where('id', '=', $creator)->first()->name;
		
		if($request->input('published') == 1)
		{
			$published = true;
		}
		else {
			$published = false;
		}
	
		
		
		$checklist = (array) \App\Article::all();
		
		
		
		$validnumber = false;
		
		while(!$validnumber)
		{
			$article_number = rand(100000000, 1000000000);
				
				if(!in_array($article_number, $checklist))
				{
					$validnumber = true;
				}
		
		}
		
		$checkcat = $request->input('category_list');
		$categoryValid = true;
		
		foreach($checkcat as $validcat){
			if($validcat == 0){
				$categoryValid = false;
			}
		}
		
		if($categoryValid){
	    
		    if ($request->file('image')->isValid())
			{
				$filename = $request->input('image');
				$request->file('image')->move(public_path().'/img/product/', $namefile);
			}
		
		    $article = Article::create(
			    [
					'title' => $title,	
					'image' => $namefile,
					'body' 	=> $body,
					'price' => $price,
					'creator' => $creatorName,
					'published' => $published,
					'article_number' => $article_number, 
			    ]
		    );
		    
		    
		   
			$categoryIds = $request->input('category_list');
			    
			$article->categories()->attach($categoryIds);
			
		    return redirect('product');
		}
		else
		{	
			
			//Behöver få in ett felmeddelande här
			return redirect('product');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
   		$article = Article::where(['id' => $id])->first();
   		
   		$related = [];

		foreach($article->categories as $category) {
			foreach(array_slice($category->articles->toArray(), 0, 4) as $relatedItem) {
				if ($relatedItem['id'] != $article->id) {
					$related[] = $relatedItem;
				}
			}
		}
   		
   		$category = "Unspecified";
	
		if ($article->categories->isEmpty() === false) {
			foreach ($article->categories as $category) {
				$category = $category->name;
			}
		}

        return view('product.show', ['article' => $article, 'category' => $category, 'relatedArticles' => $related]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::where('id', '=', $id)->firstOrFail();
		$categories = Category::lists('name', 'id');
		
		$listValue = 0;
	    
	    $categories[0] = "Choose a category";
	    
		ksort($categories);
	    
	    if (!$article->categories->isEmpty()) {
			foreach ($article->categories as $category) {
				$category = $category->name;	
			}	
			$listValue = array_search($category, $categories);
		}
		
		$published = array("Unpublished", "Published");

		return view('product.edit', ['article' => $article, 'categories' => $categories, 'listValue' => $listValue, 'published' => $published]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	
	{	
		 $this->validate($request,
        [
            'title' => 'required',
            'body' => 'required',
            'price' => 'required',
            'category_list' => 'required',

        ],
        [
        	'category_list.required' => 'Category has to be choosen.',
		]
	    );
	    
	    $title 		= $request->input('title');
	    $namefile 	= rand(10,2000) . ".png";
		$body		= $request->input('body');
		$price		= $request->input('price');
	    $img		= $request->file('image');
    
    	if($request->input('published') == 1)
		{
			$published = true;
		}
		else {
			$published = false;
		}
		
		$checkcat = $request->input('category_list');
		$categoryValid = true;
		
		foreach($checkcat as $validcat){
			if($validcat == 0){
				$categoryValid = false;
			}
		}
		
		if($categoryValid){
	 
			if($img){
					   
				$filename = $request->input('image');
				$request->file('image')->move(public_path().'/img/product/', $namefile);
				
			
			    $article = Article::where('id', '=', $id)->firstOrFail();
			
			    $article->update([
					'title' => $title,	
					'image' => $namefile,
					'body' 	=> $body,
					'price' => $price,
					'published' => $published,   
			    ]);
			    
			    $article->categories()->sync($request->input('category_list'));
			  
			    return redirect('home');
			    
			} else{
				
				$article = Article::where('id', '=', $id)->firstOrFail();
			
			    $article->update([
					'title' => $title,	
					'body' 	=> $body,
					'price' => $price,
					'published' => $published,	    
			    ]);
			    
			    $article->categories()->sync($request->input('category_list'));
			   					    
			    return redirect('home');
			}
		}
		else{
			return redirect('home');
		}
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::where('id', '=', $id)->firstOrFail();
	    $article->delete();
	
	    return redirect('home');
	}

}
