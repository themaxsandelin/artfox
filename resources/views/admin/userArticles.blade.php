@extends('master')
@section('contentNav')
	<a href="{{ url('/') }}">
		<h2>Products</h2>
	</a>
	<div class="navSpace"></div>
	<a href="{{ url('/product/admin') }}">
		<h2>Edit products</h2>
	</a>
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
				{!! Form::text('search', null, ['placeholder' => 'Search', 'name' => 'q', 'class' => 'productFormItem productInput productFormHalfItem searchInput']) !!}
				{!! Form::submit('search', ['id' => 'searchHidden', 'hidden'])  !!}
			{!! Form::close() !!}
			<div id="searchButton"></div>
		</div>
	</div>
	
    <div class="adminProducts">
		<!-- Skriver ut alla produkter för specifik användare som väljs genom länk -->
		@foreach ($articles as $article)
			<div class="adminProduct">
				<h3>{{$article->title}}</h3>				
				<p>Price: {{$article->price}} kr</p>	
				<p>Created By: {{$article->creator}}</p>					
				<a href={{ action('ProductController@edit', $article->id) }}>
					<div class="editButton"></div>
				</a>
			</div>
		@endforeach	
	</div>
</div>
</div>
<div class="buttonsBar">
	<a href="{{ URL::previous() }}">
		<div class="button greyButton">Back</div>
	</a>
</div>
@stop