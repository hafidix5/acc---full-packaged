@extends('adminlte::page')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Housings Roles</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_roles.housings_roles.create') }}" class="btn btn-success" title="Create New Housings Roles">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsRolesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Roles Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsRolesObjects as $housingsRoles)
                        <tr>
                            <td>{{ $housingsRoles->category }}</td>
                            <td>{{ $housingsRoles->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_roles.housings_roles.destroy', $housingsRoles->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_roles.housings_roles.show', $housingsRoles->id ) }}" class="btn btn-info" title="Show Housings Roles">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_roles.housings_roles.edit', $housingsRoles->id ) }}" class="btn btn-primary" title="Edit Housings Roles">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Roles" onclick="return confirm(&quot;Click Ok to delete Housings Roles.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
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
            {!! $housingsRolesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection