@extends('adminlte::page')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

 {{--  <select class="form-control" id="hpp" name="hpp" required="true">
            <option value="" style="display: none;" {{ old('hpp', optional($coas)->hpp ?: '0') == '' ? 'selected' : '' }} disabled selected>Select hpp</option>
            @if(old('hpp', optional($coas)->hpp))
            <option value="optional($coas)->hpp)" >
            @if((optional($coas)->hpp)==0)
                No
            @else
            Yes
            @endif    
            </option>   
            @endif
            <option value="0" >No</option>           
            <option value="1" >Yes</option>
        
    </select> --}}