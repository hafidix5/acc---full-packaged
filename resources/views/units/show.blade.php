@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($units->name) ? $units->name : 'Units' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('units.units.destroy', $units->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('units.units.index') }}" class="btn btn-primary" title="Show All Units">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show All</span>
                    </a>

                    <a href="{{ route('units.units.create') }}" class="btn btn-success" title="Create New Units">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create New</span>
                    </a>
                    
                    <a href="{{ route('units.units.edit', $units->id ) }}" class="btn btn-primary" title="Edit Units">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Units" onclick="return confirm(&quot;Click Ok to delete Units.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $units->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $units->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $units->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection