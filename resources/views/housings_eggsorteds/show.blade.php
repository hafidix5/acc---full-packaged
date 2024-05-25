@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Eggsorteds' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_eggsorteds.housings_eggsorteds.destroy', $housingsEggsorteds->date) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_eggsorteds.housings_eggsorteds.index') }}" class="btn btn-primary" title="Show All Housings Eggsorteds">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_eggsorteds.housings_eggsorteds.create') }}" class="btn btn-success" title="Create New Housings Eggsorteds">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_eggsorteds.housings_eggsorteds.edit', $housingsEggsorteds->date ) }}" class="btn btn-primary" title="Edit Housings Eggsorteds">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Eggsorteds" onclick="return confirm(&quot;Click Ok to delete Housings Eggsorteds.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Roles</dt>
            <dd>{{ optional($housingsEggsorteds->HousingsRole)->id }}</dd>
            <dt>Housings</dt>
            <dd>{{ optional($housingsEggsorteds->Housing)->name }}</dd>
            <dt>Storages</dt>
            <dd>{{ optional($housingsEggsorteds->HousingsStorage)->id }}</dd>
            <dt>Total</dt>
            <dd>{{ $housingsEggsorteds->total }}</dd>
            <dt>Ruined</dt>
            <dd>{{ $housingsEggsorteds->ruined }}</dd>
            <dt>Egg</dt>
            <dd>{{ $housingsEggsorteds->egg }}</dd>
            <dt>Big</dt>
            <dd>{{ $housingsEggsorteds->big }}</dd>
            <dt>Medium</dt>
            <dd>{{ $housingsEggsorteds->medium }}</dd>
            <dt>Small</dt>
            <dd>{{ $housingsEggsorteds->small }}</dd>
            <dt>Sortir</dt>
            <dd>{{ optional($housingsEggsorteds->sortir)->id }}</dd>
            <dt>Percent Real</dt>
            <dd>{{ $housingsEggsorteds->percent_real }}</dd>
            <dt>Percent Actual</dt>
            <dd>{{ $housingsEggsorteds->percent_actual }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsEggsorteds->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsEggsorteds->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection