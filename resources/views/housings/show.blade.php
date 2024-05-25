@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($housings->name) ? $housings->name : 'Housings' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings.housings.destroy', $housings->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings.housings.index') }}" class="btn btn-primary" title="Show All Housings">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings.housings.create') }}" class="btn btn-success" title="Create New Housings">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings.housings.edit', $housings->id ) }}" class="btn btn-primary" title="Edit Housings">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings" onclick="return confirm(&quot;Click Ok to delete Housings.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $housings->name }}</dd>
            <dt>Capacity</dt>
            <dd>{{ $housings->capacity }}</dd>
            <dt>Empty</dt>
            <dd>{{ $housings->empty }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housings->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housings->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection