@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Vendors' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('vendors.vendors.destroy', $vendors->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('vendors.vendors.index') }}" class="btn btn-primary" title="Show All Vendors">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show</span>
                    </a>

                    <a href="{{ route('vendors.vendors.create') }}" class="btn btn-success" title="Create New Vendors">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create New</span>
                    </a>
                    
                    <a href="{{ route('vendors.vendors.edit', $vendors->id ) }}" class="btn btn-primary" title="Edit Vendors">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Vendors" onclick="return confirm(&quot;Click Ok to delete Vendors.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Company Name</dt>
            <dd>{{ $vendors->company_name }}</dd>
            <dt>Company Address</dt>
            <dd>{{ $vendors->company_address }}</dd>
            <dt>Npwp</dt>
            <dd>{{ $vendors->npwp }}</dd>
            <dt>Sales Name</dt>
            <dd>{{ $vendors->sales_name }}</dd>
            <dt>Contact</dt>
            <dd>{{ $vendors->contact }}</dd>
            <dt>Bank Name</dt>
            <dd>{{ $vendors->bank_name }}</dd>
            <dt>Account Number</dt>
            <dd>{{ $vendors->account_number }}</dd>
            <dt>Payment Method</dt>
            <dd>{{ $vendors->payment_method }}</dd>
            <dt>Created At</dt>
            <dd>{{ $vendors->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $vendors->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection