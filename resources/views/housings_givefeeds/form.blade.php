
<div class="form-group {{ $errors->has('materials_id') ? 'has-error' : '' }}">
    <label for="materials_id" class="col-md-2 control-label">Materials</label>
    <div class="col-md-10">
        <select class="form-control" id="materials_id" name="materials_id" required="true">
        	    <option value="" style="display: none;" {{ old('materials_id', optional($housingsGivefeeds)->materials_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select materials</option>
        	@foreach ($HousingsMaterials as $key => $HousingsMaterial)
			    <option value="{{ $key }}" {{ old('materials_id', optional($housingsGivefeeds)->materials_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsMaterial }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('materials_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('roles_id') ? 'has-error' : '' }}">
    <label for="roles_id" class="col-md-2 control-label">Roles</label>
    <div class="col-md-10">
        <select class="form-control" id="roles_id" name="roles_id" required="true">
        	    <option value="" style="display: none;" {{ old('roles_id', optional($housingsGivefeeds)->roles_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select roles</option>
        	@foreach ($HousingsRoles as $key => $HousingsRole)
			    <option value="{{ $key }}" {{ old('roles_id', optional($housingsGivefeeds)->roles_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsRole }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('roles_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('housing_id') ? 'has-error' : '' }}">
    <label for="housing_id" class="col-md-2 control-label">Housing</label>
    <div class="col-md-10">
        <select class="form-control" id="housing_id" name="housing_id" required="true">
        	    <option value="" style="display: none;" {{ old('housing_id', optional($housingsGivefeeds)->housing_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select housing</option>
        	@foreach ($Housings as $key => $Housing)
			    <option value="{{ $key }}" {{ old('housing_id', optional($housingsGivefeeds)->housing_id) == $key ? 'selected' : '' }}>
			    	{{ $Housing }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('housing_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sack') ? 'has-error' : '' }}">
    <label for="sack" class="col-md-2 control-label">Sack</label>
    <div class="col-md-10">
        <input class="form-control" name="sack" type="number" id="sack" value="{{ old('sack', optional($housingsGivefeeds)->sack) }}" min="-9" max="9" required="true" placeholder="Enter sack here...">
        {!! $errors->first('sack', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('feed') ? 'has-error' : '' }}">
    <label for="feed" class="col-md-2 control-label">Feed</label>
    <div class="col-md-10">
        <input class="form-control" name="feed" type="number" id="feed" value="{{ old('feed', optional($housingsGivefeeds)->feed) }}" min="-9" max="9" required="true" placeholder="Enter feed here...">
        {!! $errors->first('feed', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('spread_out') ? 'has-error' : '' }}">
    <label for="spread_out" class="col-md-2 control-label">Spread Out</label>
    <div class="col-md-10">
        <input class="form-control" name="spread_out" type="number" id="spread_out" value="{{ old('spread_out', optional($housingsGivefeeds)->spread_out) }}" min="-9" max="9" required="true" placeholder="Enter spread out here...">
        {!! $errors->first('spread_out', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('remains') ? 'has-error' : '' }}">
    <label for="remains" class="col-md-2 control-label">Remains</label>
    <div class="col-md-10">
        <input class="form-control" name="remains" type="number" id="remains" value="{{ old('remains', optional($housingsGivefeeds)->remains) }}" min="-9" max="9" required="true" placeholder="Enter remains here...">
        {!! $errors->first('remains', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('remains_timestamps') ? 'has-error' : '' }}">
    <label for="remains_timestamps" class="col-md-2 control-label">Remains Timestamps</label>
    <div class="col-md-10">
        <input class="form-control" name="remains_timestamps" type="text" id="remains_timestamps" value="{{ old('remains_timestamps', optional($housingsGivefeeds)->remains_timestamps) }}" minlength="1" required="true" placeholder="Enter remains timestamps here...">
        {!! $errors->first('remains_timestamps', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('digested') ? 'has-error' : '' }}">
    <label for="digested" class="col-md-2 control-label">Digested</label>
    <div class="col-md-10">
        <input class="form-control" name="digested" type="number" id="digested" value="{{ old('digested', optional($housingsGivefeeds)->digested) }}" min="-9" max="9" required="true" placeholder="Enter digested here...">
        {!! $errors->first('digested', '<p class="help-block">:message</p>') !!}
    </div>
</div>

