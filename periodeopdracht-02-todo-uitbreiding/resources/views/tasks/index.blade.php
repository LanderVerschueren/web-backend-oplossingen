@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Todo's</h4></div>

				<!-- Add Tasks -->
				<div class="panel-body">
					<div class="<?php if( count($tasks) > 0 ) {echo "col-md-5";} else{echo "col-md-12";}?>">
						<div class="panel-body">
							<div class="panel panel-default">
								<div class="panel-heading">
									Add Todo's
								</div>

								<!-- Display Validation Errors -->
								@include('common.errors')

								<!-- New Task Form -->
								<form action="{{ url('task') }}" method="POST" class="form-horizontal">
									{!! csrf_field() !!}

									<!-- Task Name -->
									<div id="todo" class="form-group">
										<label for="task-name" class="col-sm-3 control-label">Todo</label>

										<div class="col-sm-6">
											<input type="text" name="name" id="task-name" class="form-control">
										</div>
									</div>

									<!-- Add Task Button -->
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-6">
											<button type="submit" class="btn btn-default">
												<i class="fa fa-plus"></i> Add Todo
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Current Tasks -->
					@if (count($tasks) > 0)
					<div class="col-md-7">
						<div class="panel-body">
							<div class="panel panel-default">
								<div class="panel-heading">
									Current Todo's
								</div>

								<div class="panel-body">
									<table class="table table-striped task-table">

										<!-- Table Body -->
										<tbody>
											@foreach ($tasks as $task)
											@if (  $task->done  == 0 )
											<tr>
												<td class="button-done">                                                         
													<form action="{{ url('/task/1/'.$task->id) }}" method="POST">
														{!! csrf_field() !!}
														<input type="hidden" name="_method" value="put">
														<button class="btn btn-default">
															<i class="glyphicon glyphicon-ok"></i>
														</button>
													</form>                                                       
												</td>

												<!-- Task Name -->
												<td class="table-text">
													<div>
														{{ $task->name }}                                                         
													</div>
												</td>

												<!-- Delete Button -->
												<td>
													<form action="{{ url('task/'.$task->id) }}" method="POST">
														{!! csrf_field() !!}
														{!! method_field('DELETE') !!}
														<input type="hidden" name="_method" value="DELETE">
														<button id="delete" class="btn btn-default">
															<i class="glyphicon glyphicon-remove"></i>
														</button>
													</form>
												</td>
											</tr>
											@endif
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					@endif

					<div class="col-md-12">
						@if (count($tasks) > 0)
						<div class="panel-body">
							<div class="panel panel-success">
								<div class="panel-heading">
									Todo's Finished
								</div>

								<div class="panel-body">
									<table class="table table-striped task-table">

										<!-- Table Body -->
										<tbody>
											@foreach ($tasks as $task)
											@if (  $task->done  == 1 )
											<tr>
												<td class="button-done"> 
													<form action="{{ url('/task/0/'.$task->id) }}" method="POST">
														{!! csrf_field() !!}
														<input type="hidden" name="_method" value="put">
														<button class="btn btn-default btn-circle">
															<i class="glyphicon glyphicon-wrench"></i>
														</button> 
													</form>
												</td>

												<!-- Task Name -->
												<td class="table-text">
													<div>
														{{ $task->name }}                                                         
													</div>
												</td>

												<!-- Delete Button -->
												<td>
													<form action="{{ url('task/'.$task->id) }}" method="POST">
														{!! csrf_field() !!}
														{!! method_field('DELETE') !!}
														<input type="hidden" name="_method" value="DELETE">
														<button id="delete" class="btn btn-default">
															<i class="glyphicon glyphicon-remove"></i>
														</button>
													</form>
												</td>
											</tr>
											@endif
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection