
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($housingsMaterialtypes)->type) }}" minlength="1" maxlength="20" required="true" placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('information') ? 'has-error' : '' }}">
    <label for="information" class="col-md-2 control-label">Information</label>
    <div class="col-md-10">
        <input class="form-control" name="information" type="text" id="information" value="{{ old('information', optional($housingsMaterialtypes)->information) }}" minlength="1" maxlength="30" required="true" placeholder="Enter information here...">
        {!! $errors->first('information', '<p class="help-block">:message</p>') !!}
    </div>
</div>

