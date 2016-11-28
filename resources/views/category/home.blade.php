@extends('master')

@section('contentNav')
	<h2 class="pageTitle">Edit categories</h2>
	<div class="navSpace"></div>
@endsection

@section('body')

	<!-- Validerar så att användaren är inloggad som superadmin -->
	@if (Auth::user()->super_user == '1')
		
		<div class="wrapper">
		    {!! Form::open(['url' => 'category', 'files'=> true]) !!}
				<div class="centerButtons">
		        	{!! Form::text('add_new_category_list', null, ['placeholder' => 'Category name', 'class' => 'productFormItem productInput productFormHalfItem']) !!}
				</div>
		        {!! Form::submit('Create Category', ['id' => 'hiddenCreateCategory', 'hidden'])  !!}
		        <div class="centerButtons">
			        <div class="button greenButton topEdge" id="createCategory">Create category</div>
		        </div>
		
		    {!! Form::close() !!}
		
		    @if($errors->any())
		        <div class="alert alert-danger">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </div>
		    @endif
		    
		    <h2 class="categories">Categories</h2>
		    
		    <!-- Skriver ut alla kategorier för super-adminen -->
		    <div class="admins">
				@foreach ($categories as $category)
					<div class="adminUser">
						<h3>{{$category->name}}</h3>
						{!! Form::open(['method' => 'POST', 'action' => ['CategoryController@verify']]) !!}
							{!! Form::input('text', 'category_id', $category->id, ['hidden']) !!}
							{!! Form::submit('Radera', ['class' => 'verifyDelete', 'hidden']) !!}
						{!! Form::close() !!}
						<div class="deleteCategoryButton"></div>
					</div>							
				@endforeach			
		    </div>
			@endif
		</div>
	
@endsection