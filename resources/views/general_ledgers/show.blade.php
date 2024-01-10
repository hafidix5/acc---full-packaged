@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'General Ledgers' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('general_ledgers.general_ledgers.destroy', $generalLedgers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('general_ledgers.general_ledgers.index') }}" class="btn btn-primary" title="Show All General Ledgers">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('general_ledgers.general_ledgers.create') }}" class="btn btn-success" title="Create New General Ledgers">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('general_ledgers.general_ledgers.edit', $generalLedgers->id ) }}" class="btn btn-primary" title="Edit General Ledgers">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete General Ledgers" onclick="return confirm(&quot;Click Ok to delete General Ledgers.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Expenditures</dt>
            <dd>{{ optional($generalLedgers->Expenditure)->date }}</dd>
            <dt>Date</dt>
            <dd>{{ $generalLedgers->date }}</dd>
            <dt>Debet</dt>
            <dd>{{ $generalLedgers->debet }}</dd>
            <dt>Credit</dt>
            <dd>{{ $generalLedgers->credit }}</dd>
            <dt>Created At</dt>
            <dd>{{ $generalLedgers->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $generalLedgers->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection