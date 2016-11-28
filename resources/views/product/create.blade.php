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
	<h2 class="pageTitle">Create a new product</h2>
	<div class="navSpace"></div>
@endSection

@section('body')
	
	<div class="wrapper">
		{!! Form::open(['url' => 'product', 'files'=> true]) !!}
			<div class="leftProductForm">
				<div class="handleProductImage" id="editProductImage" style="background:#fff; background-size:cover;">No image</div>
				{!! Form::file('image', ['id' => 'editProductImageButton', 'accept' => 'image/*', 'hidden']) !!}
				<div class="button greenButton" id="changeProductImage">Upload an image</div>
			</div>
			
			<div class="rightProductForm">
				{!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'productFormItem productInput productFormHalfItem rightEdge bottomEdge']) !!}
				{!! Form::text('price', null, ['class' => 'productFormItem productInput productFormHalfItem', 'placeholder' => 'Price (SEK)']) !!}
				{!! Form::textarea('body', null, ['placeholder' => 'Description', 'class' => 'productFormItem productTextarea']) !!}
				{!! Form::select('category_list[]', $categories, $listValue, ['class' => 'productFormItem productSelect productFormHalfItem rightEdge']) !!}
				{!! Form::select('published', $published, 1, ['class' => 'productFormItem productSelect productFormHalfItem']); !!}
			</div>

            {!! Form::submit('Save changes', ['id' => 'saveProductEdit', 'hidden'])  !!}
            

            {!! Form::close() !!}
    
</div>
</div>
<div class="productFormButtons">
	<div class="buttonsWrapper editProductAdmin">
		<a href="{{ URL::previous() }}">
			<div class="button greyButton">Cancel</div>
		</a>
		<div class="button greenButton floatRight" id="saveEditButton">Save changes</div>
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