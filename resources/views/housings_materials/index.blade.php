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
                <h4 class="mt-5 mb-5">Housings Materials</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('housings_materials.housings_materials.create') }}" class="btn btn-success" title="Create New Housings Materials">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($housingsMaterialsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Housings Materials Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Units</th>
                            <th>Grade</th>
                            <th>Age Group</th>
                            <th>Materia Types</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($housingsMaterialsObjects as $housingsMaterials)
                        <tr>
                            <td>{{ $housingsMaterials->category }}</td>
                            <td>{{ optional($housingsMaterials->HousingsUnit)->id }}</td>
                            <td>{{ $housingsMaterials->grade }}</td>
                            <td>{{ $housingsMaterials->age_group }}</td>
                            <td>{{ optional($housingsMaterials->HousingsMaterialtype)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('housings_materials.housings_materials.destroy', $housingsMaterials->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('housings_materials.housings_materials.show', $housingsMaterials->id ) }}" class="btn btn-info" title="Show Housings Materials">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('housings_materials.housings_materials.edit', $housingsMaterials->id ) }}" class="btn btn-primary" title="Edit Housings Materials">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Housings Materials" onclick="return confirm(&quot;Click Ok to delete Housings Materials.&quot;)">
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
            {!! $housingsMaterialsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection