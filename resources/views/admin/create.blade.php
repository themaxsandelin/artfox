@extends('master')

@section('contentNav')
	<a href="{{ url('/admin') }}">
		<h2>Edit admins</h2>
	</a>
	<div class="navSpace"></div>
	<h2>Create a new admin</h2>
	<div class="navSpace"></div>
@endsection

@section('body')
	<div class="wrapper">
	    {!! Form::open(['url' => 'home']) !!}
	            {!! Form::text('name', null, ['class' => 'productFormItem productInput productFormHalfItem rightEdge', 'placeholder' => 'Name']) !!}
	            {!! Form::text('email', null, ['class' => 'productFormItem productInput productFormHalfItem rightEdge', 'placeholder' => 'Email']) !!}
	            {!! Form::password('password', ['class' => 'productFormItem productInput productFormHalfItem', 'placeholder' => 'Password']) !!}
	            {!! Form::submit('Create admin', ['id' => 'hiddenCreateAdmin', 'hidden'])  !!}
	    {!! Form::close() !!}	
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
	<a href="{{ URL::previous() }}">
		<div class="button greyButton rightEdge">Cancel</div>
	</a>
	<div class="button greenButton" id="createAdmin">Create admin</div>
</div>
@endsection