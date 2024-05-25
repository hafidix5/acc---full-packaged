@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Stockopnames' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_stockopnames.housings_stockopnames.destroy', $housingsStockopnames->date) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_stockopnames.housings_stockopnames.index') }}" class="btn btn-primary" title="Show All Housings Stockopnames">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_stockopnames.housings_stockopnames.create') }}" class="btn btn-success" title="Create New Housings Stockopnames">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_stockopnames.housings_stockopnames.edit', $housingsStockopnames->date ) }}" class="btn btn-primary" title="Edit Housings Stockopnames">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Stockopnames" onclick="return confirm(&quot;Click Ok to delete Housings Stockopnames.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Storages</dt>
            <dd>{{ optional($housingsStockopnames->HousingsStorage)->id }}</dd>
            <dt>Materials</dt>
            <dd>{{ optional($housingsStockopnames->HousingsMaterial)->category }}</dd>
            <dt>Method</dt>
            <dd>{{ $housingsStockopnames->method }}</dd>
            <dt>Status</dt>
            <dd>{{ $housingsStockopnames->status }}</dd>
            <dt>Bank</dt>
            <dd>{{ $housingsStockopnames->bank }}</dd>
            <dt>Pic</dt>
            <dd>{{ optional($housingsStockopnames->pic)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsStockopnames->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsStockopnames->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection