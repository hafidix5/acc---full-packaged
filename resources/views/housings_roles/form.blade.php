<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
    <label for="category" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" id="category" name="category" required="true">
            <option value="" style="display: none;"
                {{ old('category', optional($housingsRoles)->category ?: '') == '' ? 'selected' : '' }} disabled
                selected>Select category</option>

            <option value="caretaker" {{ optional($housingsRoles)->category == 'caretaker' ? 'selected' : '' }}>caretaker</option>
            <option value="vacinator" {{ optional($housingsRoles)->category == 'vacinator' ? 'selected' : '' }}>vacinator</option>
        </select>
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name"
            value="{{ old('name', optional($housingsRoles)->name) }}" minlength="1" maxlength="30" required="true"
            placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
