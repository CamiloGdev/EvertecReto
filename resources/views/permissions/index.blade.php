@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Permissions'])
@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="card">

								<div class="card-header card-header-primary">
									<h4 class="card-title">Permissions</h4>
									<p class="card-category">Registered permissions</p>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-12 text-right">
                                            @can('permission_create')
                                            <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-facebook">Add permission</a>
                                            @endcan
										</div>
									</div>
									<div class="table-responsive">
										<table class="table">
											<thead class="text-primary">
												<th>ID</th>
												<th>Name</th>
												<th>Guard</th>
												<th>Created_at</th>
												<th class="text-right">Actions</th>
											</thead>
											<tbody>
												@forelse ($permissions as $permission)
													<tr>
														<td>{{ $permission->id }}</td>
														<td>{{ $permission->name }}</td>
														<td>{{ $permission->guard_name }}</td>
														<td>{{ $permission->created_at }}</td>
														<td class="td-actions text-right">
                                                            @can('permission_show')
															<a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                            @endcan
                                                            @can('permission_edit')
															<a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                            @endcan
                                                            @can('permission_destroy')
															<form action="{{route('permissions.destroy', $permission->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to remove this permission?')">
																@csrf
                                                            @method('DELETE')
																<button class="btn btn-danger" type="submit" rel=tooltip><i class="material-icons">close</i></button>
															</form>
                                                            @endcan
														</td>
													</tr>
													@empty
													No permissions registered yet
													@endforelse
											</tbody>
										</table>
									</div>
								</div>

								<div class="card-footer mr-auto">
									{{ $permissions->links() }}
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
