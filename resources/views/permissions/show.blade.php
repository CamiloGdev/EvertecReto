@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Permission details'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<div class="card-title">Permissions</div>
						<p class="card-category">Detailed view of permission {{ $permission->name }}</p>
					</div>
					<!--body-->
					<div class="card-body">
						<div class="row">
							{{-- Card User --}}
							<div class="col-md-6">
								<div class="card card-user">
									<div class="card-body">
										<p class="card-text">
											<div class="author">
												<a href="#">
													<img src="{{ asset('img/default-avatar.png') }}" alt="image" class="avatar">
													<h5 class="title mt-3">{{ $permission->name }}</h5>
												</a>
												<p class="description">
													{{ $permission->guard_name }} <br>
													{{ $permission->created_at }}
												</p>
											</div>
										</p>
										<div class="card-description">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, culpa accusantium nemo quam et alias?
										</div>
									</div>
									<div class="card-footer">
										<div class="button-container">
											<a href="{{ route('permissions.index') }}" class="btn btn-sm mr-3">Back</a>
											<a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary">Edit</a>
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