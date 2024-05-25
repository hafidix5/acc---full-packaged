@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Sells' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_sells.housings_sells.destroy', $housingsSells->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_sells.housings_sells.index') }}" class="btn btn-primary" title="Show All Housings Sells">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_sells.housings_sells.create') }}" class="btn btn-success" title="Create New Housings Sells">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_sells.housings_sells.edit', $housingsSells->id ) }}" class="btn btn-primary" title="Edit Housings Sells">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Sells" onclick="return confirm(&quot;Click Ok to delete Housings Sells.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Date</dt>
            <dd>{{ optional($housingsSells->HousingsEggsorted)->total }}</dd>
            <dt>Roles</dt>
            <dd>{{ optional($housingsSells->HousingsEggsorted)->total }}</dd>
            <dt>Housings</dt>
            <dd>{{ optional($housingsSells->HousingsEggsorted)->total }}</dd>
            <dt>Storages</dt>
            <dd>{{ optional($housingsSells->HousingsEggsorted)->total }}</dd>
            <dt>Category</dt>
            <dd>{{ $housingsSells->category }}</dd>
            <dt>Price</dt>
            <dd>{{ $housingsSells->price }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsSells->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsSells->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection