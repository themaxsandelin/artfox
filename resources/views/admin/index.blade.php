@extends('master')

@section('contentNav')
	<h2>Edit admins</h2>
	<div class="navSpace"></div>
@endsection

@section('body')
	<div class="wrapper noBottom">
		<div class="centerButtons">
			<a href="{{ url('admin/create') }}">
				<div class="button greenButton">Create a new admin</div>
			</a>
		</div>
	</div>
	<div class="wrapper noTop">
		<div class="admins">
			@foreach ($users as $user)
					<div class="adminUser">
						<a href={{ action('AdminController@edit', $user->id) }}>
							<h3>{{$user->name}}</h3>
							<div class="editButton"></div>
						</a>
					</div>
			@endforeach
		</div>
	</div>
@endsection