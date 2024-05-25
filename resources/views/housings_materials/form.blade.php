
<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
    <label for="category" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <input class="form-control" name="category" type="text" id="category" value="{{ old('category', optional($housingsMaterials)->category) }}" minlength="1" maxlength="15" required="true" placeholder="Enter category here...">
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('units_id') ? 'has-error' : '' }}">
    <label for="units_id" class="col-md-2 control-label">Units</label>
    <div class="col-md-10">
        <select class="form-control" id="units_id" name="units_id" required="true">
        	    <option value="" style="display: none;" {{ old('units_id', optional($housingsMaterials)->units_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select units</option>
        	@foreach ($HousingsUnits as $key => $HousingsUnit)
			    <option value="{{ $key }}" {{ old('units_id', optional($housingsMaterials)->units_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsUnit }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('units_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grade') ? 'has-error' : '' }}">
    <label for="grade" class="col-md-2 control-label">Grade</label>
    <div class="col-md-10">
        <input class="form-control" name="grade" type="text" id="grade" value="{{ old('grade', optional($housingsMaterials)->grade) }}" minlength="1" maxlength="15" required="true" placeholder="Enter grade here...">
        {!! $errors->first('grade', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('age_group') ? 'has-error' : '' }}">
    <label for="age_group" class="col-md-2 control-label">Age Group</label>
    <div class="col-md-10">
        <input class="form-control" name="age_group" type="text" id="age_group" value="{{ old('age_group', optional($housingsMaterials)->age_group) }}" min="1" max="15" required="true" placeholder="Enter age group here...">
        {!! $errors->first('age_group', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('materia_types_id') ? 'has-error' : '' }}">
    <label for="materia_types_id" class="col-md-2 control-label">Materia Types</label>
    <div class="col-md-10">
        <select class="form-control" id="materia_types_id" name="materia_types_id" required="true">
        	    <option value="" style="display: none;" {{ old('materia_types_id', optional($housingsMaterials)->materia_types_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select materia types</option>
        	@foreach ($HousingsMaterialtypes as $key => $HousingsMaterialtype)
			    <option value="{{ $key }}" {{ old('materia_types_id', optional($housingsMaterials)->materia_types_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsMaterialtype }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('materia_types_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

