
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($housings)->name) }}" minlength="1" maxlength="20" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('capacity') ? 'has-error' : '' }}">
    <label for="capacity" class="col-md-2 control-label">Capacity</label>
    <div class="col-md-10">
        <input class="form-control" name="capacity" type="number" id="capacity" value="{{ old('capacity', optional($housings)->capacity) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter capacity here...">
        {!! $errors->first('capacity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('empty') ? 'has-error' : '' }}">
    <label for="empty" class="col-md-2 control-label">Empty</label>
    <div class="col-md-10">
        <input class="form-control" name="empty" type="number" id="empty" value="{{ old('empty', optional($housings)->empty) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter empty here...">
        {!! $errors->first('empty', '<p class="help-block">:message</p>') !!}
    </div>
</div>

