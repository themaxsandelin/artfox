<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

protected $table = 'articles';

protected $fillable = [
	'title',
    'image',
    'body',
    'price',
    'creator',
    'published',
    'article_number',
];


	public function categories()
	{
	    return $this->belongsToMany('App\Category');
	}
	

	
	public function getGenreListAttribute()
	{
    	return $this->categories->lists('id');
	}
}


