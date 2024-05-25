
<div class="form-group {{ $errors->has('roles_id') ? 'has-error' : '' }}">
    <label for="roles_id" class="col-md-2 control-label">Roles</label>
    <div class="col-md-10">
        <select class="form-control" id="roles_id" name="roles_id" required="true">
        	    <option value="" style="display: none;" {{ old('roles_id', optional($housingsEggsorteds)->roles_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select roles</option>
        	@foreach ($HousingsRoles as $key => $HousingsRole)
			    <option value="{{ $key }}" {{ old('roles_id', optional($housingsEggsorteds)->roles_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsRole }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('roles_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('housings_id') ? 'has-error' : '' }}">
    <label for="housings_id" class="col-md-2 control-label">Housings</label>
    <div class="col-md-10">
        <select class="form-control" id="housings_id" name="housings_id" required="true">
        	    <option value="" style="display: none;" {{ old('housings_id', optional($housingsEggsorteds)->housings_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select housings</option>
        	@foreach ($Housings as $key => $Housing)
			    <option value="{{ $key }}" {{ old('housings_id', optional($housingsEggsorteds)->housings_id) == $key ? 'selected' : '' }}>
			    	{{ $Housing }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('housings_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('storages_id') ? 'has-error' : '' }}">
    <label for="storages_id" class="col-md-2 control-label">Storages</label>
    <div class="col-md-10">
        <select class="form-control" id="storages_id" name="storages_id" required="true">
        	    <option value="" style="display: none;" {{ old('storages_id', optional($housingsEggsorteds)->storages_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter storages here...</option>
        	@foreach ($HousingsStorages as $key => $HousingsStorage)
			    <option value="{{ $key }}" {{ old('storages_id', optional($housingsEggsorteds)->storages_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsStorage }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('storages_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
    <label for="total" class="col-md-2 control-label">Total</label>
    <div class="col-md-10">
        <input class="form-control" name="total" type="number" id="total" value="{{ old('total', optional($housingsEggsorteds)->total) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter total here...">
        {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ruined') ? 'has-error' : '' }}">
    <label for="ruined" class="col-md-2 control-label">Ruined</label>
    <div class="col-md-10">
        <input class="form-control" name="ruined" type="number" id="ruined" value="{{ old('ruined', optional($housingsEggsorteds)->ruined) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter ruined here...">
        {!! $errors->first('ruined', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('egg') ? 'has-error' : '' }}">
    <label for="egg" class="col-md-2 control-label">Egg</label>
    <div class="col-md-10">
        <input class="form-control" name="egg" type="number" id="egg" value="{{ old('egg', optional($housingsEggsorteds)->egg) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter egg here...">
        {!! $errors->first('egg', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('big') ? 'has-error' : '' }}">
    <label for="big" class="col-md-2 control-label">Big</label>
    <div class="col-md-10">
        <input class="form-control" name="big" type="number" id="big" value="{{ old('big', optional($housingsEggsorteds)->big) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter big here...">
        {!! $errors->first('big', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('medium') ? 'has-error' : '' }}">
    <label for="medium" class="col-md-2 control-label">Medium</label>
    <div class="col-md-10">
        <input class="form-control" name="medium" type="number" id="medium" value="{{ old('medium', optional($housingsEggsorteds)->medium) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter medium here...">
        {!! $errors->first('medium', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('small') ? 'has-error' : '' }}">
    <label for="small" class="col-md-2 control-label">Small</label>
    <div class="col-md-10">
        <input class="form-control" name="small" type="number" id="small" value="{{ old('small', optional($housingsEggsorteds)->small) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter small here...">
        {!! $errors->first('small', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sortir_id') ? 'has-error' : '' }}">
    <label for="sortir_id" class="col-md-2 control-label">Sortir</label>
    <div class="col-md-10">
        <select class="form-control" id="sortir_id" name="sortir_id">
        	    <option value="" style="display: none;" {{ old('sortir_id', optional($housingsEggsorteds)->sortir_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sortir</option>
        	@foreach ($sortirs as $key => $sortir)
			    <option value="{{ $key }}" {{ old('sortir_id', optional($housingsEggsorteds)->sortir_id) == $key ? 'selected' : '' }}>
			    	{{ $sortir }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sortir_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percent_real') ? 'has-error' : '' }}">
    <label for="percent_real" class="col-md-2 control-label">Percent Real</label>
    <div class="col-md-10">
        <input class="form-control" name="percent_real" type="number" id="percent_real" value="{{ old('percent_real', optional($housingsEggsorteds)->percent_real) }}" min="-9" max="9" required="true" placeholder="Enter percent real here...">
        {!! $errors->first('percent_real', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percent_actual') ? 'has-error' : '' }}">
    <label for="percent_actual" class="col-md-2 control-label">Percent Actual</label>
    <div class="col-md-10">
        <input class="form-control" name="percent_actual" type="number" id="percent_actual" value="{{ old('percent_actual', optional($housingsEggsorteds)->percent_actual) }}" min="-9" max="9" required="true" placeholder="Enter percent actual here...">
        {!! $errors->first('percent_actual', '<p class="help-block">:message</p>') !!}
    </div>
</div>

