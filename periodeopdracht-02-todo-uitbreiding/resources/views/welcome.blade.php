@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Welcome</div>

                @if (Auth::guest())
                <div class="panel-body">
                    <p>Manage your todo's. <a href=" {{ url('/login') }} ">Login</a> or <a href=" {{ url('/register') }} ">register</a> to begin!</p>
                </div>
                @else
                <div class="panel-body">
                    <p>Manager your todo's <a href="{{ url('/tasks') }}">here</a>.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
