@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($housingsUnits->name) ? $housingsUnits->name : 'Housings Units' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_units.housings_units.destroy', $housingsUnits->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_units.housings_units.index') }}" class="btn btn-primary" title="Show All Housings Units">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_units.housings_units.create') }}" class="btn btn-success" title="Create New Housings Units">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_units.housings_units.edit', $housingsUnits->id ) }}" class="btn btn-primary" title="Edit Housings Units">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Units" onclick="return confirm(&quot;Click Ok to delete Housings Units.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $housingsUnits->name }}</dd>
            <dt>Information</dt>
            <dd>{{ $housingsUnits->information }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsUnits->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsUnits->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection