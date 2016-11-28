@extends('master')

@section('contentNav')
	<a href="{{ url($link) }}">
		<h2>{{ $title }}</h2>
	</a>
	<div class="navSpace"></div>
	@if (isset($secondTitle))
		<a href="{{ url($secondLink) }}">
			<h2>{{ $secondTitle }}</h2>
		</a>
		<div class="navSpace"></div>
	@endif
	@if (isset($thirdTitle))
		<a href="{{ url($thirdLink) }}">
			<h2>{{ $thirdTitle }}</h2>
		</a>
		<div class="navSpace"></div>
	@endif
	<h2>Verify your action</h2>
@endsection

@section('body')
	
	<div class="verifyMessage">
		<h4><span class="error">{{ $intro }}</span></h4>
		<h4>{{ $middle }}<span class="mark">{{ $key }}</span>{{ $end }}</h4>
	</div>
	
	{!! Form::open(['method' => 'DELETE', 'action' => [$action, $parameter]]) !!}
		{!! Form::submit('Radera', ['id' => 'hiddenConfirmDelete', 'hidden']) !!}
	{!! Form::close() !!}
	
</div>
<div class="buttonsBar">
	<a href="{{ URL::previous() }}">
		<div class="button greyButton rightEdge">Cancel</div>
	</a>
	<div class="button greenButton" id="confirmDelete">Confirm</div>
</div>
	
@endsection