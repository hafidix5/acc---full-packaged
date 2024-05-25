@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Materialtypes' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_materialtypes.housings_materialtypes.destroy', $housingsMaterialtypes->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_materialtypes.housings_materialtypes.index') }}" class="btn btn-primary" title="Show All Housings Materialtypes">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_materialtypes.housings_materialtypes.create') }}" class="btn btn-success" title="Create New Housings Materialtypes">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_materialtypes.housings_materialtypes.edit', $housingsMaterialtypes->id ) }}" class="btn btn-primary" title="Edit Housings Materialtypes">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Materialtypes" onclick="return confirm(&quot;Click Ok to delete Housings Materialtypes.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Type</dt>
            <dd>{{ $housingsMaterialtypes->type }}</dd>
            <dt>Information</dt>
            <dd>{{ $housingsMaterialtypes->information }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsMaterialtypes->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsMaterialtypes->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection