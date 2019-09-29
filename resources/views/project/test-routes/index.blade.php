<h3>Login</h3>
<form method="post" action="{{ url('test_login/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>email</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="email" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>password</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="password" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-success">Login</button>
		</div>
	</div>
</form>
<hr>
<h3>Register</h3>
<form method="post" action="{{ url('test_register/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>name</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="name" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>role</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<select name="role" required="required" class="form-control" style="width: 100%;">
					<option value="rider">Rider</option>
					<option value="customer">customer</option>
					<option value="service_provider">service_provider</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>email</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="email" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-3 d-inline-block">
				<strong>password</strong>
			</div>
			<div class="col-xs-9 d-inline-block">
				<input type="text" name="password" required="required" class="form-control" style="width: 100%;">
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-info">Register</button>
		</div>
	</div>
</form>
<hr>
<h3>Logout</h3>
<form method="post" action="{{ url('test_logout/') }}" class="custom_div_1" enctype="multipart/form-data">
	@csrf
	<div class="row form-group">
		<div class="col-xs-12">
			<div class="col-xs-1 d-inline-block">
				<strong>user</strong>
			</div>
			<div class="col-xs-11 d-inline-block">
				<select name="user_api_token" required="required" class="form-control" style="width: 100%;">
					@foreach($users as $user)					
					<option value="{{ $user->api_token }}">{{ $user->id }} - {{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row from-group">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-danger">Logout</button>
		</div>
	</div>
</form>