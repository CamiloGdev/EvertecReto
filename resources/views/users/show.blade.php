@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'User details'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<div class="card-title">Users</div>
						<p class="card-category">Detailed view of user {{ $user->name }}</p>
					</div>
					<!--body-->
					<div class="card-body">
						@if (session('success'))
							<div class="alert alert-success" role="success">
								{{ session('success') }}
							</div>
						@endif
						<div class="row">
							{{-- Card User --}}
							<div class="col-md-6">
								<div class="card card-user">
									<div class="card-body">
										<p class="card-text">
											<div class="author">
												<a href="#">
													<img src="{{ asset('img/default-avatar.png') }}" alt="image" class="avatar">
													<h5 class="title mt-3">{{ $user->name }}</h5>
												</a>
												<p class="description">
													{{ $user->username }} <br>
													{{ $user->email }} <br>
													{{ $user->created_at }}
												</p>
											</div>
										</p>
										<div class="card-description">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, culpa accusantium nemo quam et alias?
										</div>
									</div>
									<div class="card-footer">
										<div class="button-container">
											<a href="{{ route('users.index') }}" class="btn btn-sm mr-3">Back</a>
											<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
											{{-- <button class="btn btn-sm btn-primary">Edit</button> --}}
										</div>
									</div>
								</div>
							</div>
							{{-- End Card User --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>    
@endsection