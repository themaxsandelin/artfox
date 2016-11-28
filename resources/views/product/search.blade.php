@extends('master')
	
@section('contentNav')

<h2 class="pageTitle">Your Result: {{ count($articles) }} Products</h2>

<div class="navSpace"></div>

{!! Form::open(array('action' => 'ProductController@search', 'method' => 'get')) !!}

{!! Form::text('search', null, ['placeholder' => 'Search', 'name' => 'q', 'class' => 'productFormItem productInput productFormHalfItem rightEdge bottomEdge']) !!}

{!! Form::submit('search', ['id' => 'saveProductEdit'])  !!}


{!! Form::close() !!}

<div class="navSpace"></div>

<!-- Tar tillbaka till startsidan -->
<a href="/"><h2 class="pageTitle">Back</h2></a>

@endSection
	
@section('body')
		
			@foreach ($articles as $article)
				
							
					@include('product.display')
					
				
			@endforeach

						
@endsection

