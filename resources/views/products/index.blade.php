@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'products'])
@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="card">

								<div class="card-header card-header-primary">
									<h4 class="card-title">Products</h4>
									<p class="card-category">Registered products</p>
								</div>

								<div class="card-body">
									@if (session('success'))
										<div class="alert alert-success" role="success">
											{{ session('success') }}
										</div>
									@endif
									<div class="row">
										<div class="col-12 text-right">
                                            @can('product_create')
                                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-facebook">Add product</a>
                                            @endcan
										</div>
									</div>
									<div class="table-responsive">
										<table class="table">
											<thead class="text-primary">
												<th>ID</th>
                        <th>REF</th>
                        <th>Name</th>
{{--												<th>Description</th>--}}
												<th>Price</th>
												<th>Quantity</th>
												<th class="text-right">Actions</th>
											</thead>
											<tbody>
												@foreach ($products as $product)
													<tr>
														<td>{{ $product->id }}</td>
														<td>{{ $product->ref }}</td>
														<td>{{ $product->name }}</td>
{{--														<td>{{ $product->description }}</td>--}}
														<td>{{ $product->price }}</td>
														<td>{{ $product->quantity }}</td>

														<td class="td-actions text-right">
                                                            @can('product_show')
                                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                                            @endcan
                                                            @can('product_edit')
															<a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                            @endcan
                                                            @can('product_destroy')
															<form action="{{route('products.destroy', $product->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to remove this product?')">
																@csrf
																@method('DELETE')
																<button class="btn btn-danger" type="submit" rel=tooltip><i class="material-icons">close</i></button>
															</form>
                                                            @endcan
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>

								<div class="card-footer mr-auto">
									{{ $products->links() }}
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
