@extends('adminlte::page')


@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($departments->name) ? $departments->name : 'Departments' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('departments.departments.destroy', $departments->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('departments.departments.index') }}" class="btn btn-primary" title="Show All Departments">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                    </a>

                    <a href="{{ route('departments.departments.create') }}" class="btn btn-success" title="Create New Departments">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('departments.departments.edit', $departments->id ) }}" class="btn btn-primary" title="Edit Departments">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Departments" onclick="return confirm(&quot;Click Ok to delete Departments.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $departments->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $departments->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $departments->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection