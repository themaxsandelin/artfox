@extends('master')

@section('contentNav')
	<a href="{{ url('/') }}">
		<h2 class="pageTitle">Products</h2>
	</a>
	<div class="navSpace"></div>
	<h2 class="pageTitle">{{ $article->title }}</h2>
	<div class="navSpace"></div>
@endSection

@section('body')
<div class="wrapper">
	<div class="showProduct">
		<div class="showProductImage" style="background:url({{ url('img/product/').'/'.$article->image }}) no-repeat center center; background-size:cover;"></div>
		<div class="showProductInfo">
			<h1>{{ $article->title }}</h1>
			<p>{{ $article->body }}</p>
			<p class="articleNumber">Artikelnummer: {{ $article->article_number }}</p>
			@if ($category === "Unspecified")
				@if (!Auth::guest() && Auth::user()->super_user == '1')
					<p>Category: <span>{{ $category }}</span></p>
				@endif
			@else
				<p>Category: <span>{{ $category }}</span></p>
			@endif
			<h2 class="price">{{ $article->price }} SEK</h2>
		</div>
		@if (!Auth::guest())
			@if ($article->creator == Auth::user()->name || Auth::user()->super_user == '1')
				<a href="{{ action('ProductController@edit', $article->id)}}">
					<div class="editButton"></div>
				</a>
			@endif
		@endif
	</div>
</div>
@if (!empty($relatedArticles))
	<h2 class="related">Relaterade produkter</h2>
@endif

@foreach($relatedArticles as $related)
	@include('product.related')
@endforeach


@endsection