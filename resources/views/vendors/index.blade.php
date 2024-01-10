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
                <h4 class="mt-5 mb-5">Vendors</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('vendors.vendors.create') }}" class="btn btn-success" title="Create New Vendors">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create New Vendors</span>
                </a>
            </div>

        </div>
        
        @if(count($vendorsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Vendors Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Company Address</th>
                            <th>Npwp</th>
                            <th>Sales Name</th>
                            <th>Contact</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Payment Method</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vendorsObjects as $vendors)
                        <tr>
                            <td>{{ $vendors->company_name }}</td>
                            <td>{{ $vendors->company_address }}</td>
                            <td>{{ $vendors->npwp }}</td>
                            <td>{{ $vendors->sales_name }}</td>
                            <td>{{ $vendors->contact }}</td>
                            <td>{{ $vendors->bank_name }}</td>
                            <td>{{ $vendors->account_number }}</td>
                            <td>{{ $vendors->payment_method }}</td>

                            <td>

                                <form method="POST" action="{!! route('vendors.vendors.destroy', $vendors->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('vendors.vendors.show', $vendors->id ) }}" class="btn btn-info" title="Show Vendors">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('vendors.vendors.edit', $vendors->id ) }}" class="btn btn-primary" title="Edit Vendors">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Vendors" onclick="return confirm(&quot;Click Ok to delete Vendors.&quot;)">
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
            {!! $vendorsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection