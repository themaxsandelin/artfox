@extends('master')

@section('contentNav')
	<a href="{{ url('/') }}">
		<h2 class="pageTitle">Products</h2>
	</a>
	<div class="navSpace"></div>
	<h2 class="pageTitle">Edit products</h2>
	<div class="navSpace"></div>
@endsection

@section('body')
	<div class="wrapper">
		
		<div class="centerButtons">
			<a href="{{ action('ProductController@create') }}">
				<div class="button greenButton bottomEdge">Create New Product</div>
			</a>
		</div>
		<div class="centerButtons">
			<div id="searchBox">
				{!! Form::open(array('action' => 'ProductController@searchAdmin', 'method' => 'get')) !!}
					{!! Form::text('search', $searchValue, ['placeholder' => 'Search', 'name' => 'q', 'class' => 'productFormItem productInput productFormHalfItem searchInput']) !!}
					{!! Form::submit('search', ['id' => 'searchHidden', 'hidden'])  !!}
				{!! Form::close() !!}
				<div id="searchButton"></div>
			</div>
		</div>
		
		<!-- Skriver ut alla produkter för super-adminen -->
		<div class="adminProducts">
			@if (Auth::user()->super_user == '1')
			
			@if ($articles->isEmpty())
				<h2 class="noResultAdmin">{{ "No results to show" }}</h2>
			@endif
			
				@foreach ($articles as $article)
					<div class="adminProduct">
						<h3>{{$article->title}}</h3>
														
						<p>Price: <span>{{$article->price}} SEK</span></p>
						<p>Category: <span>@foreach($article->categories as $category) {{ $category->name}} @endforeach</span></p>
						<p>Created By: <a href="{{ action('AdminController@showUser', $article->creator) }}"><span>{{$article->creator}}</span></a></p>				
												
						<a href="{{ action('ProductController@edit', $article->id) }}">
							<div class="editButton"></div>
						</a>	
					</div>
				@endforeach			
			@else	
				<!-- Skriver ut alla användarens produkter om det är en vanlig admin -->
				
				@if ($articles->isEmpty())
					<h2 class="noResultAdmin">{{ "No results to show" }}</h2>
				@endif	
								
				@foreach ($articles as $article)
					@if ($article->creator == Auth::user()->name)
						<div class="adminProduct">
							<h3>{{$article->title}}</h3>
														
							<p>Price: <span>{{$article->price}} SEK</span></p>																	
							<a href="{{ action('ProductController@edit', $article->id) }}">
								<div class="editButton"></div>
							</a>
						</div>
					@endif	
				@endforeach			
			@endif			
		</div>
	</div>
@endsection