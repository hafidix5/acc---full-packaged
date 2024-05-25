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
                <h4 class="mt-5 mb-5">Housings Hasroles</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_hasroles.housings_hasroles.create') }}" class="btn btn-success" title="Create New Housings Hasroles">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsHasrolesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Hasroles Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Housing</th>
                            <th>Roles</th>
                            <th>Hen</th>
                            <th>Doc</th>
                            <th>Check In</th>
                            <th>Doc Age</th>
                            <th>Housing Age</th>
                            <th>Grade</th>
                            <th>Days Age</th>
                            <th>Sell</th>
                            <th>Mortality</th>
                            <th>Sort Out</th>
                            <th>Hen Total Real</th>
                            <th>Hen Total Actual</th>
                            <th>Insert 1</th>
                            <th>From Housing</th>
                            <th>Move</th>
                            <th>To Housing</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsHasrolesObjects as $housingsHasroles)
                        <tr>
                            <td>{{ optional($housingsHasroles->Housing)->name }}</td>
                            <td>{{ optional($housingsHasroles->HousingsRole)->id }}</td>
                            <td>{{ $housingsHasroles->hen }}</td>
                            <td>{{ $housingsHasroles->doc }}</td>
                            <td>{{ $housingsHasroles->check_in }}</td>
                            <td>{{ $housingsHasroles->doc_age }}</td>
                            <td>{{ $housingsHasroles->housing_age }}</td>
                            <td>{{ $housingsHasroles->grade }}</td>
                            <td>{{ $housingsHasroles->days_age }}</td>
                            <td>{{ $housingsHasroles->sell }}</td>
                            <td>{{ $housingsHasroles->mortality }}</td>
                            <td>{{ $housingsHasroles->sort_out }}</td>
                            <td>{{ $housingsHasroles->hen_total_real }}</td>
                            <td>{{ $housingsHasroles->hen_total_actual }}</td>
                            <td>{{ $housingsHasroles->insert_1 }}</td>
                            <td>{{ optional($housingsHasroles->fromHousing)->id }}</td>
                            <td>{{ $housingsHasroles->move }}</td>
                            <td>{{ optional($housingsHasroles->toHousing)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_hasroles.housings_hasroles.destroy', $housingsHasroles->date) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_hasroles.housings_hasroles.show', $housingsHasroles->date ) }}" class="btn btn-info" title="Show Housings Hasroles">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_hasroles.housings_hasroles.edit', $housingsHasroles->date ) }}" class="btn btn-primary" title="Edit Housings Hasroles">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Hasroles" onclick="return confirm(&quot;Click Ok to delete Housings Hasroles.&quot;)">
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
            {!! $housingsHasrolesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection