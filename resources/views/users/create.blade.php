@extends('layouts.main', ['activePage'=>'users','titlePage'=>'New user'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class=col-md-12>
				<form action="{{ route('users.store')}}" method="post" class="form-horisontal">
					@csrf
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">User</h4>
							<p class="card-category">Enter data</p>
						</div>
						<div class="card-body">
							{{-- @if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li> {{$error}} </li>
										@endforeach
									</ul>
								</div>
							@endif --}}
							<div class="row">
								<label for="name" class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name') }}" autofocus>
									@if ($errors->has('name'))
										<span class="error text-danger" for="input-name">{{$errors->first('name')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="username" class="col-sm-2 col-form-label">User Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="username" placeholder="Enter your user name" value="{{ old('username') }}">
									@if ($errors->has('username'))
										<span class="error text-danger" for="input-username">{{$errors->first('username')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-7">
									<input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
									@if ($errors->has('email'))
										<span class="error text-danger" for="input-email">{{$errors->first('email')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="password" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-7">
									<input type="password" class="form-control" name="password" placeholder="Password">
									@if ($errors->has('password'))
										<span class="error text-danger" for="input-Password">{{$errors->first('password')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="roles" class="col-sm-2 col-form-label">Roles</label>
								<div class="col-sm-7">
									<div class="form-group">
										<div class="tab-content">
											<div class="tab-pane active">
												<table class="table">
													<tbody>
														@foreach ($roles as $id => $role)
														<tr>
															<td>
																<div class="form-check">
																	<label class="form-check-label">
																		<input class="form-check-input" type="checkbox" name="roles[]"
																			value="{{ $id }}"
																		>
																		<span class="form-check-sign">
																			<span class="check"></span>
																		</span>
																	</label>
																</div>
															</td>
															<td>
																{{ $role }}
															</td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="card-footer ml-auto mr-auto">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection