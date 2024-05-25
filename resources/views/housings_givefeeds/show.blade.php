@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Givefeeds' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_givefeeds.housings_givefeeds.destroy', $housingsGivefeeds->date) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_givefeeds.housings_givefeeds.index') }}" class="btn btn-primary" title="Show All Housings Givefeeds">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_givefeeds.housings_givefeeds.create') }}" class="btn btn-success" title="Create New Housings Givefeeds">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_givefeeds.housings_givefeeds.edit', $housingsGivefeeds->date ) }}" class="btn btn-primary" title="Edit Housings Givefeeds">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Givefeeds" onclick="return confirm(&quot;Click Ok to delete Housings Givefeeds.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Materials</dt>
            <dd>{{ optional($housingsGivefeeds->HousingsMaterial)->id }}</dd>
            <dt>Roles</dt>
            <dd>{{ optional($housingsGivefeeds->HousingsRole)->id }}</dd>
            <dt>Housing</dt>
            <dd>{{ optional($housingsGivefeeds->Housing)->name }}</dd>
            <dt>Sack</dt>
            <dd>{{ $housingsGivefeeds->sack }}</dd>
            <dt>Feed</dt>
            <dd>{{ $housingsGivefeeds->feed }}</dd>
            <dt>Spread Out</dt>
            <dd>{{ $housingsGivefeeds->spread_out }}</dd>
            <dt>Remains</dt>
            <dd>{{ $housingsGivefeeds->remains }}</dd>
            <dt>Remains Timestamps</dt>
            <dd>{{ $housingsGivefeeds->remains_timestamps }}</dd>
            <dt>Digested</dt>
            <dd>{{ $housingsGivefeeds->digested }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsGivefeeds->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsGivefeeds->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection