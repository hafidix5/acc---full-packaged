@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Hasroles' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_hasroles.housings_hasroles.destroy', $housingsHasroles->date) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_hasroles.housings_hasroles.index') }}" class="btn btn-primary" title="Show All Housings Hasroles">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_hasroles.housings_hasroles.create') }}" class="btn btn-success" title="Create New Housings Hasroles">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_hasroles.housings_hasroles.edit', $housingsHasroles->date ) }}" class="btn btn-primary" title="Edit Housings Hasroles">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Hasroles" onclick="return confirm(&quot;Click Ok to delete Housings Hasroles.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Housing</dt>
            <dd>{{ optional($housingsHasroles->Housing)->name }}</dd>
            <dt>Roles</dt>
            <dd>{{ optional($housingsHasroles->HousingsRole)->id }}</dd>
            <dt>Hen</dt>
            <dd>{{ $housingsHasroles->hen }}</dd>
            <dt>Doc</dt>
            <dd>{{ $housingsHasroles->doc }}</dd>
            <dt>Check In</dt>
            <dd>{{ $housingsHasroles->check_in }}</dd>
            <dt>Doc Age</dt>
            <dd>{{ $housingsHasroles->doc_age }}</dd>
            <dt>Housing Age</dt>
            <dd>{{ $housingsHasroles->housing_age }}</dd>
            <dt>Grade</dt>
            <dd>{{ $housingsHasroles->grade }}</dd>
            <dt>Days Age</dt>
            <dd>{{ $housingsHasroles->days_age }}</dd>
            <dt>Sell</dt>
            <dd>{{ $housingsHasroles->sell }}</dd>
            <dt>Mortality</dt>
            <dd>{{ $housingsHasroles->mortality }}</dd>
            <dt>Sort Out</dt>
            <dd>{{ $housingsHasroles->sort_out }}</dd>
            <dt>Hen Total Real</dt>
            <dd>{{ $housingsHasroles->hen_total_real }}</dd>
            <dt>Hen Total Actual</dt>
            <dd>{{ $housingsHasroles->hen_total_actual }}</dd>
            <dt>Insert 1</dt>
            <dd>{{ $housingsHasroles->insert_1 }}</dd>
            <dt>From Housing</dt>
            <dd>{{ optional($housingsHasroles->fromHousing)->id }}</dd>
            <dt>Move</dt>
            <dd>{{ $housingsHasroles->move }}</dd>
            <dt>To Housing</dt>
            <dd>{{ optional($housingsHasroles->toHousing)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsHasroles->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsHasroles->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection