@extends( 'layouts.app' )

@section( 'content' )

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>404-Error!</h4></div>
					<div class="panel-body">
						<h3>This page does exist!</h3>

						<p>Congratulations with finding this page!</p>
						<p>Now get back to the <a href="{{ url( '/' ) }}">homepage</a>!</p>
						<p>P.S.: Maybe some extra points? :D</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection