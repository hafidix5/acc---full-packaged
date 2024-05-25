@extends('adminlte::page')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Housings Materialtypes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_materialtypes.housings_materialtypes.create') }}" class="btn btn-success" title="Create New Housings Materialtypes">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsMaterialtypesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Materialtypes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Information</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsMaterialtypesObjects as $housingsMaterialtypes)
                        <tr>
                            <td>{{ $housingsMaterialtypes->type }}</td>
                            <td>{{ $housingsMaterialtypes->information }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_materialtypes.housings_materialtypes.destroy', $housingsMaterialtypes->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_materialtypes.housings_materialtypes.show', $housingsMaterialtypes->id ) }}" class="btn btn-info" title="Show Housings Materialtypes">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_materialtypes.housings_materialtypes.edit', $housingsMaterialtypes->id ) }}" class="btn btn-primary" title="Edit Housings Materialtypes">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Materialtypes" onclick="return confirm(&quot;Click Ok to delete Housings Materialtypes.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
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
            {!! $housingsMaterialtypesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection