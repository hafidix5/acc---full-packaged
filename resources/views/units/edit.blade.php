@extends('adminlte::page')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($units->name) ? $units->name : 'Units' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('units.units.index') }}" class="btn btn-primary" title="Show All Units">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show All</span>
                </a>

                <a href="{{ route('units.units.create') }}" class="btn btn-success" title="Create New Units">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create New</span>
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

            <form method="POST" action="{{ route('units.units.update', $units->id) }}" id="edit_units_form" name="edit_units_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('units.form', [
                                        'units' => $units,
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