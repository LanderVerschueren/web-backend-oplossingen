@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Dashboard</h4></div>

                <div class="panel-body">
                    <h5>You are logged in!</h5>
                    <p>Manage your todo's <a href=" {{ url('/tasks') }} ">here</a>.</p>

                    @if (count($tasks) > 0)
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current Todo's
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>Todo</th>
                                        <th>&nbsp;</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($tasks as $task)
                                        <tr>
                                            <!-- Task Name -->
                                            <td class="table-text">
                                                <div>
                                                    {{ $task->name }}
                                                    @if ( $task->done == 1 )
                                                    (It's already been done!)
                                                    @endif
                                                </div>

                                            </td>
                                        </tr>
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
@endsection
