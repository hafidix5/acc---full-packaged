@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($subjects->name) ? $subjects->name : 'Subjects' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('subjects.subjects.destroy', $subjects->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('subjects.subjects.index') }}" class="btn btn-primary" title="Show All Subjects">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('subjects.subjects.create') }}" class="btn btn-success" title="Create New Subjects">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('subjects.subjects.edit', $subjects->id ) }}" class="btn btn-primary" title="Edit Subjects">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Subjects" onclick="return confirm(&quot;Click Ok to delete Subjects.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $subjects->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $subjects->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $subjects->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection