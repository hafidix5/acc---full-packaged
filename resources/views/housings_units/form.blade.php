
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($housingsUnits)->name) }}" minlength="1" maxlength="6" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('information') ? 'has-error' : '' }}">
    <label for="information" class="col-md-2 control-label">Information</label>
    <div class="col-md-10">
        <input class="form-control" name="information" type="text" id="information" value="{{ old('information', optional($housingsUnits)->information) }}" minlength="1" maxlength="30" required="true" placeholder="Enter information here...">
        {!! $errors->first('information', '<p class="help-block">:message</p>') !!}
    </div>
</div>

