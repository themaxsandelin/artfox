<div class="productWrapper">
	<div class="product">
		@if (!Auth::guest())
			@if ($article->creator == Auth::user()->name || Auth::user()->super_user == '1')
				<a href="{{ action('ProductController@edit', $article->id)}}">
					<div class="editButton"></div>
				</a>
			@endif
		@endif
		<a href="{{ action('ProductController@show', $article->id)}}">
			<div class="productImage" style="background:url(img/product/{{$article->image}}) no-repeat center center; background-size:cover;"></div>
			<div class="productViewInfo">
				<h2>{{$article->title}}</h2>
				<h2 class="price">{{$article->price}} SEK</h2>
			</div>
		</a>
	</div>
</div>