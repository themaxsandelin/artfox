@extends('master')
	
@section('contentNav')

	@if ($active) 
		<a href="{{ url('/') }}">
	@endif
		<h2 class="pageTitle">Products</h2>
	@if ($active) 
		</a>
	@endif
	<div class="navSpace"></div>		

<div id="filterButton" class="@if ($active) {{ 'active' }} @endif"></div>

@endsection

@section('homeFilter')
	<div class="homeFilterWrapper">
		<div id="homeFilter" @if ($active) {{ 'class=move data-filter-state=open' }} @else {{ 'data-filter-state=closed' }} @endif>
			<!-- Skriver ut form för kategorier -->
				{!! Form::open(array('action' => 'ProductController@filterIndex', 'method' => 'get', 'id' => 'searchForm')) !!}
			@if(isset($id))
				{!! Form::select('category_list', $categories, $listValue, ['id' => 'toggleCat', 'name' => 'cat', 'class' => 'productFormItem productSelect productFormHalfItem rightEdge filterItem']) !!}
			@else
				{!! Form::select('category_list', $categories, 0, ['id' => 'toggleCat', 'class' => 'productFormItem productSelect productFormHalfItem rightEdge filterItem']) !!}
			@endif
			<div id="searchBox">
				<!-- Form som tar in söksträng och skickar till söksidan. Söker på namn och artikelnummer -->
				
				{!! Form::text('search', $searchValue, ['placeholder' => 'Search', 'name' => 'q', 'class' => 'productFormItem productInput productFormHalfItem filterItem']) !!}
				{!! Form::submit('search', ['id' => 'searchHidden', 'hidden'])  !!}
				{!! Form::close() !!}
				<div id="searchButton"></div>
			</div>
		</div>
	</div>

@endsection
	
@section('body')

		<div id="products" @if ($active) {{'data-category-chosen=true'}} @else {{'data-category-chosen=false'}} @endif>
			
			@if (empty($articles))
				<h2 class="noResults">{{ "No results to show" }}</h2>
			@endif
			
			@if($id == "All")
				@foreach ($articles as $article)
					@if($article->published == 1)
						@include('product.display')
					@endif
				@endforeach
			@else
				@foreach ($articles as $article)
						@if($article->published == 1)
							@include('product.display')
						@endif
				@endforeach	
			@endif
	
		</div>
@endsection

