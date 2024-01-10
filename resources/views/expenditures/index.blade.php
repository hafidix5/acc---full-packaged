@extends('adminlte::page')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Expenditures</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('expenditures.expenditures.create') }}" class="btn btn-success" title="Create New Expenditures">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($expendituresObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Expenditures Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Coas</th>
                            <th>Products</th>
                            <th>Subjects</th>
                            <th>Criterias</th>
                            <th>Departments</th>
                            <th>Vendors</th>
                            <th>Qty</th>
                            <th>Units</th>
                            <th>Price</th>
                            <th>Svc Charge</th>
                            <th>Bank Charge</th>
                            <th>Signed</th>
                            <th>Invoice Number</th>
                            <th>Add Information</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($expendituresObjects as $expenditures)
                        <tr>
                            <td>{{ $expenditures->date }}</td>
                            <td>{{ optional($expenditures->Coa)->cs_code }}</td>
                            <td>{{ optional($expenditures->Product)->name }}</td>
                            <td>{{ optional($expenditures->Subject)->name }}</td>
                            <td>{{ optional($expenditures->Criteria)->name }}</td>
                            <td>{{ optional($expenditures->Department)->name }}</td>
                            <td>{{ optional($expenditures->Vendor)->company_name }}</td>
                            <td>{{ $expenditures->qty }}</td>
                            <td>{{ optional($expenditures->Unit)->name }}</td>
                            <td>{{ $expenditures->price }}</td>
                            <td>{{ $expenditures->svc_charge }}</td>
                            <td>{{ $expenditures->bank_charge }}</td>
                            <td>{{ $expenditures->signed }}</td>
                            <td>{{ $expenditures->invoice_number }}</td>
                            <td>{{ $expenditures->add_information }}</td>

                            <td>

                                <form method="POST" action="{!! route('expenditures.expenditures.destroy', $expenditures->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('expenditures.expenditures.show', $expenditures->id ) }}" class="btn btn-info" title="Show Expenditures">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('expenditures.expenditures.edit', $expenditures->id ) }}" class="btn btn-primary" title="Edit Expenditures">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Expenditures" onclick="return confirm(&quot;Click Ok to delete Expenditures.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $expendituresObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection