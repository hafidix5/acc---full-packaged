@extends('adminlte::page')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Chart Of Account</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('coas.coas.create') }}" class="btn btn-success" title="Create New Coas">
                    Create New COA
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($coasObjects) == 0)
            <div class="panel-body text-center">
                <h4>No COA Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>COA</th>
                            <th>Cs Code</th>
                            <th>Account</th>
                            <th>Beginning Balance</th>
                            <th>HPP</th>
                            <th>Add Information</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($coasObjects as $coas)
                        <tr>
                            <td>{{ $coas->id }}</td>
                            <td>{{ $coas->cs_code }}</td>
                            <td>{{ $coas->account }}</td>
                            <td>{{ $coas->beginning_balance }}</td>
                            <td>{{ $coas->hpp }}</td>
                            <td>{{ $coas->add_information }}</td>

                            <td>

                                <form method="POST" action="{!! route('coas.coas.destroy', $coas->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('coas.coas.show', $coas->id ) }}" class="btn btn-info" title="Show Coas">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('coas.coas.edit', $coas->id ) }}" class="btn btn-primary" title="Edit Coas">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Coas" onclick="return confirm(&quot;Click Ok to delete Coas.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $coasObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection