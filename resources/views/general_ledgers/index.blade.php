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
                <h4 class="mt-5 mb-5">General Ledgers</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('general_ledgers.general_ledgers.create') }}" class="btn btn-success" title="Create New General Ledgers">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($generalLedgersObjects) == 0)
            <div class="panel-body text-center">
                <h4>No General Ledgers Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Expenditures</th>
                            <th>Coas</th>
                            <th>Information</th>
                            <th>Debet</th>
                            <th>Credit</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($generalLedgersObjects as $generalLedgers)
                        <tr>
                            <td>{{ optional($generalLedgers->Expenditure)->date_payment }}</td>
                            <td>{{ optional($generalLedgers->Coa)->cs_code }}</td>
                            <td>{{ $generalLedgers->information }}</td>
                            <td>{{ $generalLedgers->debet }}</td>
                            <td>{{ $generalLedgers->credit }}</td>

                            <td>

                                <form method="POST" action="{!! route('general_ledgers.general_ledgers.destroy', $generalLedgers->date) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('general_ledgers.general_ledgers.show', $generalLedgers->date ) }}" class="btn btn-info" title="Show General Ledgers">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('general_ledgers.general_ledgers.edit', $generalLedgers->date ) }}" class="btn btn-primary" title="Edit General Ledgers">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete General Ledgers" onclick="return confirm(&quot;Click Ok to delete General Ledgers.&quot;)">
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
            {!! $generalLedgersObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection