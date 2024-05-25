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
                <h4 class="mt-5 mb-5">Housings Givetreatments</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_givetreatments.housings_givetreatments.create') }}" class="btn btn-success" title="Create New Housings Givetreatments">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsGivetreatmentsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Givetreatments Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Materials</th>
                            <th>Roles</th>
                            <th>Housing</th>
                            <th>Treatment</th>
                            <th>Dosage</th>
                            <th>Application Method</th>
                            <th>Roles</th>
                            <th>Category</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsGivetreatmentsObjects as $housingsGivetreatments)
                        <tr>
                            <td>{{ optional($housingsGivetreatments->HousingsMaterial)->id }}</td>
                            <td>{{ optional($housingsGivetreatments->HousingsRole)->id }}</td>
                            <td>{{ optional($housingsGivetreatments->Housing)->name }}</td>
                            <td>{{ $housingsGivetreatments->treatment }}</td>
                            <td>{{ $housingsGivetreatments->dosage }}</td>
                            <td>{{ $housingsGivetreatments->application_method }}</td>
                            <td>{{ $housingsGivetreatments->roles_id_1 }}</td>
                            <td>{{ $housingsGivetreatments->category }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_givetreatments.housings_givetreatments.destroy', $housingsGivetreatments->date) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_givetreatments.housings_givetreatments.show', $housingsGivetreatments->date ) }}" class="btn btn-info" title="Show Housings Givetreatments">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_givetreatments.housings_givetreatments.edit', $housingsGivetreatments->date ) }}" class="btn btn-primary" title="Edit Housings Givetreatments">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Givetreatments" onclick="return confirm(&quot;Click Ok to delete Housings Givetreatments.&quot;)">
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
            {!! $housingsGivetreatmentsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection