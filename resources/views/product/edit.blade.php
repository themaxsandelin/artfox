@extends('master')

@section('contentNav')
	<a href="{{ url('/') }}">
		<h2 class="pageTitle">Products</h2>
	</a>
	<div class="navSpace"></div>
	<a href="{{ url('/product/admin') }}">
		<h2 class="pageTitle">Edit products</h2>
	</a>
	<div class="navSpace"></div>
	<h2 class="pageTitle">{{ $article->title }}</h2>
	<div class="navSpace"></div>
@endSection

@section('body')
	<div class="wrapper">
		{!! Form::model($article, ['method' => 'PATCH', 'files'=> true, 'action' => ['ProductController@update', $article->id]]) !!}
			<div class="leftProductForm">
				<div class="handleProductImage" id="editProductImage" style="background:url({{ url('img/product/').'/'. $article->image }}) no-repeat center center #fff; background-size:cover;"></div>
				{!! Form::file('image', ['id' => 'editProductImageButton', 'accept' => 'image/*', 'hidden']) !!}
				<div class="button greenButton" id="changeProductImage">Upload an image</div>
			</div>
			
			<div class="rightProductForm">
				{!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'productFormItem productInput productFormHalfItem rightEdge bottomEdge']) !!}
				{!! Form::text('price', null, ['class' => 'productFormItem productInput productFormHalfItem', 'placeholder' => 'Price (SEK)']) !!}
				{!! Form::textarea('body', null, ['placeholder' => 'Description', 'class' => 'productFormItem productTextarea']) !!}
				{!! Form::select('category_list[]', $categories, $listValue, ['class' => 'productFormItem productSelect productFormHalfItem rightEdge']) !!}
				{!! Form::select('published', $published, $article->published, ['class' => 'productFormItem productSelect productFormHalfItem']); !!}
			</div>

            {!! Form::submit('Save changes', ['id' => 'saveProductEdit', 'hidden'])  !!}
            
    {!! Form::close() !!}
    
</div>
</div>
<div class="productFormButtons">
	<div class="buttonsWrapper @if (Auth::user()->super_user == '1')editProductSuperAdmin @else editProductAdmin @endif">
		<a href="{{ URL::previous() }}">
			<div class="button greyButton">Cancel</div>
		</a>
		@if (Auth::user()->super_user == '1')
			{!! Form::open(['method' => 'DELETE', 'action' => ['ProductController@destroy', $article->id]]) !!}
				{!! Form::submit('Radera', ['id' => 'deleteProduct', 'hidden']) !!}
			{!! Form::close() !!}
			
			{!! Form::open(['method' => 'POST', 'action' => ['ProductController@verify']]) !!}
				{!! Form::input('text', 'article_id', $article->id, ['hidden']) !!}
				{!! Form::submit('Radera', ['class' => 'verifyDelete', 'hidden']) !!}
			{!! Form::close() !!}
			<div class="button redButton leftEdge" id="deleteProductButton">Delete product</div>
			<div class="button greenButton floatRight" id="saveEditButton">Save changes</div>
		@else
			<div class="button greenButton floatRight" id="saveEditButton">Save changes</div>
		@endif
	</div>
</div>


	    
	@if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    
@endSection