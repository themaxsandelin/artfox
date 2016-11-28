@extends('master')

@section('contentNav')
	<a href="{{ url('/admin') }}">
		<h2>Edit admins</h2>
	</a>
	<div class="navSpace"></div>
	<h2>{{ $user->name }}</h2>
	<div class="navSpace"></div>
@endsection

@section('body')
	<div class="wrapper">
	    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminController@update', $user->id]]) !!}
	    <div class="centerButtons">
	        {!! Form::text('name', null, ['class' => 'productFormItem productInput productFormHalfItem rightEdge', 'placeholder' => 'Name']) !!}
		    {!! Form::text('email', null, ['class' => 'productFormItem productInput productFormHalfItem rightEdge', 'placeholder' => 'Email']) !!}
	    </div>
	
	        {!! Form::submit('Update user', ['id' => 'hiddenUpdateAdmin', 'hidden'])  !!}
	    {!! Form::close() !!}
	    
	    @if ($super_admin === "0")
			{!! Form::open(['method' => 'POST', 'action' => ['AdminController@verify']]) !!}
				{!! Form::input('text', 'user_id', $user->id, ['hidden']) !!}
				{!! Form::submit('Radera', ['class' => 'verifyDelete', 'hidden']) !!}
			{!! Form::close() !!}
		@endif
	
	    @if($errors->any())
	        <div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </div>
	    @endif
	</div>
</div>

<div class="buttonsBar">
	<a href="{{ url('/admin') }}">
		<div class="button greyButton rightEdge">Cancel</div>
	</a>
	@if ($super_admin === "0")
		<div class="button redButton deleteAdminButton rightEdge">Delete admin</div>
	@endif
	<div class="button greenButton" id="saveAdminChanges">Save changes</div>
</div>
@stop