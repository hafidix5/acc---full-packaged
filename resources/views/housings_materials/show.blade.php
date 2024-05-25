@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Housings Materials' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('housings_materials.housings_materials.destroy', $housingsMaterials->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('housings_materials.housings_materials.index') }}" class="btn btn-primary" title="Show All Housings Materials">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('housings_materials.housings_materials.create') }}" class="btn btn-success" title="Create New Housings Materials">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('housings_materials.housings_materials.edit', $housingsMaterials->id ) }}" class="btn btn-primary" title="Edit Housings Materials">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Housings Materials" onclick="return confirm(&quot;Click Ok to delete Housings Materials.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Category</dt>
            <dd>{{ $housingsMaterials->category }}</dd>
            <dt>Units</dt>
            <dd>{{ optional($housingsMaterials->HousingsUnit)->id }}</dd>
            <dt>Grade</dt>
            <dd>{{ $housingsMaterials->grade }}</dd>
            <dt>Age Group</dt>
            <dd>{{ $housingsMaterials->age_group }}</dd>
            <dt>Materia Types</dt>
            <dd>{{ optional($housingsMaterials->HousingsMaterialtype)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $housingsMaterials->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $housingsMaterials->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection