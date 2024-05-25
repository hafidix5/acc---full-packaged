
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($housingsStorages)->name) }}" minlength="1" maxlength="20" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
    <label for="location" class="col-md-2 control-label">Location</label>
    <div class="col-md-10">
        <input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($housingsStorages)->location) }}" minlength="1" maxlength="20" required="true" placeholder="Enter location here...">
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
    <label for="category" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <input class="form-control" name="category" type="text" id="category" value="{{ old('category', optional($housingsStorages)->category) }}" minlength="1" maxlength="20" required="true" placeholder="Enter category here...">
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

