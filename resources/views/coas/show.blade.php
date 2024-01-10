@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Coas' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('coas.coas.destroy', $coas->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('coas.coas.index') }}" class="btn btn-primary" title="Show All Coas">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('coas.coas.create') }}" class="btn btn-success" title="Create New Coas">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('coas.coas.edit', $coas->id ) }}" class="btn btn-primary" title="Edit Coas">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Coas" onclick="return confirm(&quot;Click Ok to delete Coas.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Cs Code</dt>
            <dd>{{ $coas->cs_code }}</dd>
            <dt>Account</dt>
            <dd>{{ $coas->account }}</dd>
            <dt>Description</dt>
            <dd>{{ $coas->description }}</dd>
            <dt>Beginning Balance</dt>
            <dd>{{ $coas->beginning_balance }}</dd>
            <dt>Hpp</dt>
            <dd>{{ $coas->hpp }}</dd>
            <dt>Add Information</dt>
            <dd>{{ $coas->add_information }}</dd>
            <dt>Created At</dt>
            <dd>{{ $coas->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $coas->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection