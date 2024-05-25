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
                <h4 class="mt-5 mb-5">Housings Stockopnames</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_stockopnames.housings_stockopnames.create') }}" class="btn btn-success" title="Create New Housings Stockopnames">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsStockopnamesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Stockopnames Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Storages</th>
                            <th>Materials</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Bank</th>
                            <th>Pic</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsStockopnamesObjects as $housingsStockopnames)
                        <tr>
                            <td>{{ optional($housingsStockopnames->HousingsStorage)->id }}</td>
                            <td>{{ optional($housingsStockopnames->HousingsMaterial)->category }}</td>
                            <td>{{ $housingsStockopnames->method }}</td>
                            <td>{{ $housingsStockopnames->status }}</td>
                            <td>{{ $housingsStockopnames->bank }}</td>
                            <td>{{ optional($housingsStockopnames->pic)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_stockopnames.housings_stockopnames.destroy', $housingsStockopnames->date) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_stockopnames.housings_stockopnames.show', $housingsStockopnames->date ) }}" class="btn btn-info" title="Show Housings Stockopnames">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_stockopnames.housings_stockopnames.edit', $housingsStockopnames->date ) }}" class="btn btn-primary" title="Edit Housings Stockopnames">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Stockopnames" onclick="return confirm(&quot;Click Ok to delete Housings Stockopnames.&quot;)">
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
            {!! $housingsStockopnamesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection