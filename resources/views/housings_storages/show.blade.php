@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($housingsStorages->name) ? $housingsStorages->name : 'Housings Storages' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_storages.housings_storages.destroy', $housingsStorages->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_storages.housings_storages.index') }}" class="btn btn-primary" title="Show All Housings Storages">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_storages.housings_storages.create') }}" class="btn btn-success" title="Create New Housings Storages">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_storages.housings_storages.edit', $housingsStorages->id ) }}" class="btn btn-primary" title="Edit Housings Storages">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Storages" onclick="return confirm(&quot;Click Ok to delete Housings Storages.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $housingsStorages->name }}</dd>
            <dt>Location</dt>
            <dd>{{ $housingsStorages->location }}</dd>
            <dt>Category</dt>
            <dd>{{ $housingsStorages->category }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsStorages->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsStorages->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection