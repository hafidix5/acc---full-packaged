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
                <h4 class="mt-5 mb-5">Invoices</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('invoices.invoices.create') }}" class="btn btn-success" title="Create New Invoices">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($invoicesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Invoices Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Date</th>
                            <th>File Invoice</th>
                            <th>Vendors</th>
                            <th>Created at</th>
                            <th>Updated at</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($invoicesObjects as $invoices)
                        <tr>
                            <td>{{ $invoices->id }}</td>
                            <td>{{ $invoices->date }}</td>
                            <td>
                                <a target="_blank" href="{{ asset("$invoices->file_invoice") }}">View File</a>
                                </td>
                            <td>{{ optional($invoices->Vendor)->company_name }}</td>
                            <td>{{$invoices->created_at}}</td>
                            <td>{{$invoices->updated_at}}</td>

                            <td>

                                <form method="POST" action="{!! route('invoices.invoices.destroy', $invoices->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('invoices.invoices.show', $invoices->id ) }}" class="btn btn-info" title="Show Invoices">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('invoices.invoices.edit', $invoices->id ) }}" class="btn btn-primary" title="Edit Invoices">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Invoices" onclick="return confirm(&quot;Click Ok to delete Invoices.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
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
            {!! $invoicesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection