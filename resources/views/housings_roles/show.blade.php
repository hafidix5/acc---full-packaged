@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($housingsRoles->name) ? $housingsRoles->name : 'Housings Roles' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_roles.housings_roles.destroy', $housingsRoles->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_roles.housings_roles.index') }}" class="btn btn-primary" title="Show All Housings Roles">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_roles.housings_roles.create') }}" class="btn btn-success" title="Create New Housings Roles">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_roles.housings_roles.edit', $housingsRoles->id ) }}" class="btn btn-primary" title="Edit Housings Roles">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Roles" onclick="return confirm(&quot;Click Ok to delete Housings Roles.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>{{ $housingsRoles->category }}</dd>
            <dt>Name</dt>
            <dd>{{ $housingsRoles->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsRoles->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsRoles->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection