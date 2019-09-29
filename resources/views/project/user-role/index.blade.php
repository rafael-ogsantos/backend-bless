@extends('project.index')
@section('content')
<div id="wrapper-content">
    <!-- PAGE WRAPPER-->
    <div id="page-wrapper">
        <!-- MAIN CONTENT-->
        <div class="main-content text-center">
            <!-- CONTENT-->
            <div class="content">
            	@if(is_object(Auth::user()))
            		<h1>{{ Auth::user()->name }}</h1>
            	@endif
            	<table class="table" id="data-table">
            		<thead>
            			<tr>
            				<th class="text-center">ID</th>
            				<th class="text-center">Name</th>
            				<th class="text-center">Email</th>
            				<th class="text-center">Admin</th>
            				<th class="text-center">Franchise Users</th>
            				<th class="text-center">Client Users</th>
                            <th class="text-center">Assign New Role</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($users as $user)
            				<tr>
            					<form method="post" action="{{ route('assign.roles') }}">
            						@csrf
	            					<td>{{ $user->id }}</td>
	            					<td>{{ $user->name }}</td>
	            					<td>{{ $user->email }}
	            						<input type="hidden" name="email" value="{{ $user->email }}">
	            					</td>
                                    <td>
                                        <input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="admin">
                                    </td>
	            					<td>
	            						<input type="checkbox" {{ $user->hasRole('Franchise') ? 'checked' : '' }} name="buyer">
	            					</td>
	            					<td>
	            						<input type="checkbox" {{ $user->hasRole('Client') ? 'checked' : '' }} name="seller">
	            					</td>
	            					<td>
	            						<button type="submit" class="btn btn-blue btn-bold">
	            							<span>Assign Role</span>
	            						</button>
	            					</td>
            					</form>
            				</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection