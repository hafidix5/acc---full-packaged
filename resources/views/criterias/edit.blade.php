@extends('adminlte::page')


@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($criterias->name) ? $criterias->name : 'Criterias' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('criterias.criterias.index') }}" class="btn btn-primary" title="Show All Criterias">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                </a>

                <a href="{{ route('criterias.criterias.create') }}" class="btn btn-success" title="Create New Criterias">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('criterias.criterias.update', $criterias->id) }}" id="edit_criterias_form" name="edit_criterias_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('criterias.form', [
                                        'criterias' => $criterias,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection