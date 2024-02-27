@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Expenditures' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('expenditures.expenditures.destroy', $expenditures->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('expenditures.expenditures.index') }}" class="btn btn-primary" title="Show All Expenditures">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                    </a>

                    <a href="{{ route('expenditures.expenditures.create') }}" class="btn btn-success" title="Create New Expenditures">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('expenditures.expenditures.edit', $expenditures->id ) }}" class="btn btn-primary" title="Edit Expenditures">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Expenditures" onclick="return confirm(&quot;Click Ok to delete Expenditures.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Date Payment</dt>
            <dd>{{ $expenditures->date_payment }}</dd>
            <dt>Invoices</dt>
            <dd>{{ optional($expenditures->Invoice)->date }}</dd>
            <dt>Coas</dt>
            <dd>{{ optional($expenditures->Coa)->cs_code }}</dd>
            <dt>Criterias</dt>
            <dd>{{ optional($expenditures->Criteria)->name }}</dd>
            <dt>Departments</dt>
            <dd>{{ optional($expenditures->Department)->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $expenditures->description }}</dd>
           
            <dt>Qty</dt>
            <dd>{{ $expenditures->qty }}</dd>
            <dt>Units</dt>
            <dd>{{ optional($expenditures->Unit)->name }}</dd>
            <dt>Price</dt>
            <dd>{{ $expenditures->price }}</dd>
            <dt>Svc Charge</dt>
            <dd>{{ $expenditures->svc_charge }}</dd>
            <dt>Bank Charge</dt>
            <dd>{{ $expenditures->bank_charge }}</dd>
            <dt>Discount Percentage</dt>
            <dd>{{ $expenditures->discount_percentage }}</dd>
            <dt>Amount</dt>
            <dd>{{ $expenditures->amount }}</dd>
            <dt>Payment</dt>
            <dd>{{ $expenditures->payment }}</dd>
            <dt>Signed</dt>
            <dd>{{ $expenditures->signed }}</dd>
            <dt>Iscash</dt>
            <dd>{{ $expenditures->iscash }}</dd>
            <dt>Method</dt>
            <dd>{{ $expenditures->method }}</dd>
            <dt>Add Information</dt>
            <dd>{{ $expenditures->add_information }}</dd>
            <dt>Created At</dt>
            <dd>{{ $expenditures->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $expenditures->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection