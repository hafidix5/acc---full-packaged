@extends('adminlte::page')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Coas' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('coas.coas.index') }}" class="btn btn-primary" title="Show All Coas">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show All</span>
                </a>

                <a href="{{ route('coas.coas.create') }}" class="btn btn-success" title="Create New Coas">
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

            <form method="POST" action="{{ route('coas.coas.update', $coas->id) }}" id="edit_coas_form" name="edit_coas_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('coas.form', [
                                        'coas' => $coas,
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