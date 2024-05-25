@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Givetreatments' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_givetreatments.housings_givetreatments.destroy', $housingsGivetreatments->date) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_givetreatments.housings_givetreatments.index') }}" class="btn btn-primary" title="Show All Housings Givetreatments">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_givetreatments.housings_givetreatments.create') }}" class="btn btn-success" title="Create New Housings Givetreatments">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_givetreatments.housings_givetreatments.edit', $housingsGivetreatments->date ) }}" class="btn btn-primary" title="Edit Housings Givetreatments">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Givetreatments" onclick="return confirm(&quot;Click Ok to delete Housings Givetreatments.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Materials</dt>
            <dd>{{ optional($housingsGivetreatments->HousingsMaterial)->id }}</dd>
            <dt>Roles</dt>
            <dd>{{ optional($housingsGivetreatments->HousingsRole)->id }}</dd>
            <dt>Housing</dt>
            <dd>{{ optional($housingsGivetreatments->Housing)->name }}</dd>
            <dt>Treatment</dt>
            <dd>{{ $housingsGivetreatments->treatment }}</dd>
            <dt>Dosage</dt>
            <dd>{{ $housingsGivetreatments->dosage }}</dd>
            <dt>Application Method</dt>
            <dd>{{ $housingsGivetreatments->application_method }}</dd>
            <dt>Roles</dt>
            <dd>{{ $housingsGivetreatments->roles_id_1 }}</dd>
            <dt>Category</dt>
            <dd>{{ $housingsGivetreatments->category }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsGivetreatments->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsGivetreatments->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection