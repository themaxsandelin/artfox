<div class="productWrapper">
	<div class="product">
		@if (!Auth::guest())
			@if ($related['creator'] == Auth::user()->id || Auth::user()->super_user == '1')
				<a href="{{ action('ProductController@edit', $related['id'])}}">
					<div class="editButton"></div>
				</a>
			@endif
		@endif
		<a href="{{ action('ProductController@show', $related['id'])}}">
			<div class="productImage" style="background:url({{ url('/img/product/').'/'.$related['image']}}) no-repeat center center; background-size:cover;"></div>
			<div class="productViewInfo">
				<h2>{{$related['title']}}</h2>
				<h2 class="price">Price: {{$related['price']}} kr</h2>
			</div>
		</a>
	</div>
</div>