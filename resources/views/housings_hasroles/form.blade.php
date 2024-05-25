
<div class="form-group {{ $errors->has('housing_id') ? 'has-error' : '' }}">
    <label for="housing_id" class="col-md-2 control-label">Housing</label>
    <div class="col-md-10">
        <select class="form-control" id="housing_id" name="housing_id" required="true">
        	    <option value="" style="display: none;" {{ old('housing_id', optional($housingsHasroles)->housing_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select housing</option>
        	@foreach ($Housings as $key => $Housing)
			    <option value="{{ $key }}" {{ old('housing_id', optional($housingsHasroles)->housing_id) == $key ? 'selected' : '' }}>
			    	{{ $Housing }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('housing_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('roles_id') ? 'has-error' : '' }}">
    <label for="roles_id" class="col-md-2 control-label">Roles</label>
    <div class="col-md-10">
        <select class="form-control" id="roles_id" name="roles_id" required="true">
        	    <option value="" style="display: none;" {{ old('roles_id', optional($housingsHasroles)->roles_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select roles</option>
        	@foreach ($HousingsRoles as $key => $HousingsRole)
			    <option value="{{ $key }}" {{ old('roles_id', optional($housingsHasroles)->roles_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsRole }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('roles_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hen') ? 'has-error' : '' }}">
    <label for="hen" class="col-md-2 control-label">Hen</label>
    <div class="col-md-10">
        <input class="form-control" name="hen" type="number" id="hen" value="{{ old('hen', optional($housingsHasroles)->hen) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter hen here...">
        {!! $errors->first('hen', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('doc') ? 'has-error' : '' }}">
    <label for="doc" class="col-md-2 control-label">Doc</label>
    <div class="col-md-10">
        <input class="form-control" name="doc" type="text" id="doc" value="{{ old('doc', optional($housingsHasroles)->doc) }}" required="true" placeholder="Enter doc here...">
        {!! $errors->first('doc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('check_in') ? 'has-error' : '' }}">
    <label for="check_in" class="col-md-2 control-label">Check In</label>
    <div class="col-md-10">
        <input class="form-control" name="check_in" type="text" id="check_in" value="{{ old('check_in', optional($housingsHasroles)->check_in) }}" required="true" placeholder="Enter check in here...">
        {!! $errors->first('check_in', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('doc_age') ? 'has-error' : '' }}">
    <label for="doc_age" class="col-md-2 control-label">Doc Age</label>
    <div class="col-md-10">
        <input class="form-control" name="doc_age" type="number" id="doc_age" value="{{ old('doc_age', optional($housingsHasroles)->doc_age) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter doc age here...">
        {!! $errors->first('doc_age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('housing_age') ? 'has-error' : '' }}">
    <label for="housing_age" class="col-md-2 control-label">Housing Age</label>
    <div class="col-md-10">
        <input class="form-control" name="housing_age" type="number" id="housing_age" value="{{ old('housing_age', optional($housingsHasroles)->housing_age) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter housing age here...">
        {!! $errors->first('housing_age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grade') ? 'has-error' : '' }}">
    <label for="grade" class="col-md-2 control-label">Grade</label>
    <div class="col-md-10">
        <input class="form-control" name="grade" type="text" id="grade" value="{{ old('grade', optional($housingsHasroles)->grade) }}" minlength="1" maxlength="15" required="true" placeholder="Enter grade here...">
        {!! $errors->first('grade', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('days_age') ? 'has-error' : '' }}">
    <label for="days_age" class="col-md-2 control-label">Days Age</label>
    <div class="col-md-10">
        <input class="form-control" name="days_age" type="number" id="days_age" value="{{ old('days_age', optional($housingsHasroles)->days_age) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter days age here...">
        {!! $errors->first('days_age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sell') ? 'has-error' : '' }}">
    <label for="sell" class="col-md-2 control-label">Sell</label>
    <div class="col-md-10">
        <input class="form-control" name="sell" type="number" id="sell" value="{{ old('sell', optional($housingsHasroles)->sell) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter sell here...">
        {!! $errors->first('sell', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mortality') ? 'has-error' : '' }}">
    <label for="mortality" class="col-md-2 control-label">Mortality</label>
    <div class="col-md-10">
        <input class="form-control" name="mortality" type="number" id="mortality" value="{{ old('mortality', optional($housingsHasroles)->mortality) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter mortality here...">
        {!! $errors->first('mortality', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sort_out') ? 'has-error' : '' }}">
    <label for="sort_out" class="col-md-2 control-label">Sort Out</label>
    <div class="col-md-10">
        <input class="form-control" name="sort_out" type="number" id="sort_out" value="{{ old('sort_out', optional($housingsHasroles)->sort_out) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter sort out here...">
        {!! $errors->first('sort_out', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hen_total_real') ? 'has-error' : '' }}">
    <label for="hen_total_real" class="col-md-2 control-label">Hen Total Real</label>
    <div class="col-md-10">
        <input class="form-control" name="hen_total_real" type="number" id="hen_total_real" value="{{ old('hen_total_real', optional($housingsHasroles)->hen_total_real) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter hen total real here...">
        {!! $errors->first('hen_total_real', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hen_total_actual') ? 'has-error' : '' }}">
    <label for="hen_total_actual" class="col-md-2 control-label">Hen Total Actual</label>
    <div class="col-md-10">
        <input class="form-control" name="hen_total_actual" type="number" id="hen_total_actual" value="{{ old('hen_total_actual', optional($housingsHasroles)->hen_total_actual) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter hen total actual here...">
        {!! $errors->first('hen_total_actual', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('insert_1') ? 'has-error' : '' }}">
    <label for="insert_1" class="col-md-2 control-label">Insert 1</label>
    <div class="col-md-10">
        <input class="form-control" name="insert_1" type="number" id="insert_1" value="{{ old('insert_1', optional($housingsHasroles)->insert_1) }}" min="-2147483648" max="2147483647" placeholder="Enter insert 1 here...">
        {!! $errors->first('insert_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('from_housing_id') ? 'has-error' : '' }}">
    <label for="from_housing_id" class="col-md-2 control-label">From Housing</label>
    <div class="col-md-10">
        <select class="form-control" id="from_housing_id" name="from_housing_id">
        	    <option value="" style="display: none;" {{ old('from_housing_id', optional($housingsHasroles)->from_housing_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select from housing</option>
        	@foreach ($fromHousings as $key => $fromHousing)
			    <option value="{{ $key }}" {{ old('from_housing_id', optional($housingsHasroles)->from_housing_id) == $key ? 'selected' : '' }}>
			    	{{ $fromHousing }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('from_housing_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('move') ? 'has-error' : '' }}">
    <label for="move" class="col-md-2 control-label">Move</label>
    <div class="col-md-10">
        <input class="form-control" name="move" type="number" id="move" value="{{ old('move', optional($housingsHasroles)->move) }}" min="-2147483648" max="2147483647" placeholder="Enter move here...">
        {!! $errors->first('move', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('to_housing_id') ? 'has-error' : '' }}">
    <label for="to_housing_id" class="col-md-2 control-label">To Housing</label>
    <div class="col-md-10">
        <select class="form-control" id="to_housing_id" name="to_housing_id">
        	    <option value="" style="display: none;" {{ old('to_housing_id', optional($housingsHasroles)->to_housing_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select to housing</option>
        	@foreach ($toHousings as $key => $toHousing)
			    <option value="{{ $key }}" {{ old('to_housing_id', optional($housingsHasroles)->to_housing_id) == $key ? 'selected' : '' }}>
			    	{{ $toHousing }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('to_housing_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

