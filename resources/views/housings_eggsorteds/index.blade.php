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
                <h4 class="mt-5 mb-5">Housings Eggsorteds</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_eggsorteds.housings_eggsorteds.create') }}" class="btn btn-success" title="Create New Housings Eggsorteds">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsEggsortedsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Eggsorteds Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Roles</th>
                            <th>Housings</th>
                            <th>Storages</th>
                            <th>Total</th>
                            <th>Ruined</th>
                            <th>Egg</th>
                            <th>Big</th>
                            <th>Medium</th>
                            <th>Small</th>
                            <th>Sortir</th>
                            <th>Percent Real</th>
                            <th>Percent Actual</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsEggsortedsObjects as $housingsEggsorteds)
                        <tr>
                            <td>{{ optional($housingsEggsorteds->HousingsRole)->id }}</td>
                            <td>{{ optional($housingsEggsorteds->Housing)->name }}</td>
                            <td>{{ optional($housingsEggsorteds->HousingsStorage)->id }}</td>
                            <td>{{ $housingsEggsorteds->total }}</td>
                            <td>{{ $housingsEggsorteds->ruined }}</td>
                            <td>{{ $housingsEggsorteds->egg }}</td>
                            <td>{{ $housingsEggsorteds->big }}</td>
                            <td>{{ $housingsEggsorteds->medium }}</td>
                            <td>{{ $housingsEggsorteds->small }}</td>
                            <td>{{ optional($housingsEggsorteds->sortir)->id }}</td>
                            <td>{{ $housingsEggsorteds->percent_real }}</td>
                            <td>{{ $housingsEggsorteds->percent_actual }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_eggsorteds.housings_eggsorteds.destroy', $housingsEggsorteds->date) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_eggsorteds.housings_eggsorteds.show', $housingsEggsorteds->date ) }}" class="btn btn-info" title="Show Housings Eggsorteds">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_eggsorteds.housings_eggsorteds.edit', $housingsEggsorteds->date ) }}" class="btn btn-primary" title="Edit Housings Eggsorteds">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Eggsorteds" onclick="return confirm(&quot;Click Ok to delete Housings Eggsorteds.&quot;)">
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
            {!! $housingsEggsortedsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection