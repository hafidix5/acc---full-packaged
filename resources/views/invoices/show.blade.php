@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Invoices' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('invoices.invoices.destroy', $invoices->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('invoices.invoices.index') }}" class="btn btn-primary" title="Show All Invoices">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                    </a>

                    <a href="{{ route('invoices.invoices.create') }}" class="btn btn-success" title="Create New Invoices">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('invoices.invoices.edit', $invoices->id ) }}" class="btn btn-primary" title="Edit Invoices">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Invoices" onclick="return confirm(&quot;Click Ok to delete Invoices.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Date</dt>
            <dd>{{ $invoices->date }}</dd>
            <dt>File Invoice</dt>
            <dd>  <a target="_blank" href="{{ asset("$invoices->file_invoice") }}">View File</a></dd>
            <dt>Vendors</dt>
            <dd>{{ optional($invoices->Vendor)->company_name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $invoices->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $invoices->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection