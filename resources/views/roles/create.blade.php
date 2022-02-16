@extends('layouts.main', ['activePage'=>'roles','titlePage'=>'New role'])
@section('content')
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class=col-md-12>
								<form action="{{ route('roles.store')}}" method="post" class="form-horisontal">
										@csrf
										<div class="card">
												<div class="card-header card-header-primary">
														<h4 class="card-title">Role</h4>
														<p class="card-category">Enter data</p>
												</div>
												<div class="card-body">
														<div class="row">
																<label for="name" class="col-sm-2 col-form-label">Role name</label>
																<div class="col-sm-7">
																		<input type="text" class="form-control" name="name" autofocus>
																</div>
														</div>
														<div class="row">
															<label for="name" class="clo-sm-2 col-form-label">Select permissions</label>
															<div class="col-sm-7">
																<div class="form-group">
																		<div class="tab-content">
																				<div class="tab-pane active">
																						<table class="table">
																								<tbody>
																										@foreach ($permissions as $id => $permission)
																										<tr>
																												<td>
																														<div class="form-check">
																																<label class="form-check-label">
																																		<input class="form-check-input" type="checkbox" name="permissions[]"
																																				value="{{ $id }}">
																																		<span class="form-check-sign">
																																				<span class="check"></span>
																																		</span>
																																</label>
																														</div>
																												</td>
																												<td>
																														{{ $permission }}
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