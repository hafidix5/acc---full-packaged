
<div class="form-group {{ $errors->has('materials_id') ? 'has-error' : '' }}">
    <label for="materials_id" class="col-md-2 control-label">Materials</label>
    <div class="col-md-10">
        <select class="form-control" id="materials_id" name="materials_id" required="true">
        	    <option value="" style="display: none;" {{ old('materials_id', optional($housingsGivetreatments)->materials_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select materials</option>
        	@foreach ($HousingsMaterials as $key => $HousingsMaterial)
			    <option value="{{ $key }}" {{ old('materials_id', optional($housingsGivetreatments)->materials_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('roles_id', optional($housingsGivetreatments)->roles_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select roles</option>
        	@foreach ($HousingsRoles as $key => $HousingsRole)
			    <option value="{{ $key }}" {{ old('roles_id', optional($housingsGivetreatments)->roles_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('housing_id', optional($housingsGivetreatments)->housing_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select housing</option>
        	@foreach ($Housings as $key => $Housing)
			    <option value="{{ $key }}" {{ old('housing_id', optional($housingsGivetreatments)->housing_id) == $key ? 'selected' : '' }}>
			    	{{ $Housing }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('housing_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('treatment') ? 'has-error' : '' }}">
    <label for="treatment" class="col-md-2 control-label">Treatment</label>
    <div class="col-md-10">
        <input class="form-control" name="treatment" type="text" id="treatment" value="{{ old('treatment', optional($housingsGivetreatments)->treatment) }}" minlength="1" maxlength="30" required="true" placeholder="Enter treatment here...">
        {!! $errors->first('treatment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dosage') ? 'has-error' : '' }}">
    <label for="dosage" class="col-md-2 control-label">Dosage</label>
    <div class="col-md-10">
        <input class="form-control" name="dosage" type="number" id="dosage" value="{{ old('dosage', optional($housingsGivetreatments)->dosage) }}" min="-9" max="9" required="true" placeholder="Enter dosage here...">
        {!! $errors->first('dosage', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('application_method') ? 'has-error' : '' }}">
    <label for="application_method" class="col-md-2 control-label">Application Method</label>
    <div class="col-md-10">
        <input class="form-control" name="application_method" type="text" id="application_method" value="{{ old('application_method', optional($housingsGivetreatments)->application_method) }}" minlength="1" maxlength="30" required="true" placeholder="Enter application method here...">
        {!! $errors->first('application_method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('roles_id_1') ? 'has-error' : '' }}">
    <label for="roles_id_1" class="col-md-2 control-label">Roles</label>
    <div class="col-md-10">
        <input class="form-control" name="roles_id_1" type="text" id="roles_id_1" value="{{ old('roles_id_1', optional($housingsGivetreatments)->roles_id_1) }}" minlength="1" maxlength="5" required="true" placeholder="Enter roles here...">
        {!! $errors->first('roles_id_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
    <label for="category" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <input class="form-control" name="category" type="text" id="category" value="{{ old('category', optional($housingsGivetreatments)->category) }}" minlength="1" maxlength="20" required="true" placeholder="Enter category here...">
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

