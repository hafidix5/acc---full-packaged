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
                <h4 class="mt-5 mb-5">Housings Givefeeds</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_givefeeds.housings_givefeeds.create') }}" class="btn btn-success" title="Create New Housings Givefeeds">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsGivefeedsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Givefeeds Available.</h4>
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
                            <th>Sack</th>
                            <th>Feed</th>
                            <th>Spread Out</th>
                            <th>Remains</th>
                            <th>Remains Timestamps</th>
                            <th>Digested</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsGivefeedsObjects as $housingsGivefeeds)
                        <tr>
                            <td>{{ optional($housingsGivefeeds->HousingsMaterial)->id }}</td>
                            <td>{{ optional($housingsGivefeeds->HousingsRole)->id }}</td>
                            <td>{{ optional($housingsGivefeeds->Housing)->name }}</td>
                            <td>{{ $housingsGivefeeds->sack }}</td>
                            <td>{{ $housingsGivefeeds->feed }}</td>
                            <td>{{ $housingsGivefeeds->spread_out }}</td>
                            <td>{{ $housingsGivefeeds->remains }}</td>
                            <td>{{ $housingsGivefeeds->remains_timestamps }}</td>
                            <td>{{ $housingsGivefeeds->digested }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_givefeeds.housings_givefeeds.destroy', $housingsGivefeeds->date) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_givefeeds.housings_givefeeds.show', $housingsGivefeeds->date ) }}" class="btn btn-info" title="Show Housings Givefeeds">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_givefeeds.housings_givefeeds.edit', $housingsGivefeeds->date ) }}" class="btn btn-primary" title="Edit Housings Givefeeds">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Givefeeds" onclick="return confirm(&quot;Click Ok to delete Housings Givefeeds.&quot;)">
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
            {!! $housingsGivefeedsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection