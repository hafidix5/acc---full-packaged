
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <select class="form-control" id="date" name="date" required="true">
        	    <option value="" style="display: none;" {{ old('date', optional($housingsSells)->date ?: '') == '' ? 'selected' : '' }} disabled selected>Enter date here...</option>
        	@foreach ($HousingsEggsorteds as $key => $HousingsEggsorted)
			    <option value="{{ $key }}" {{ old('date', optional($housingsSells)->date) == $key ? 'selected' : '' }}>
			    	{{ $HousingsEggsorted }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('roles_id') ? 'has-error' : '' }}">
    <label for="roles_id" class="col-md-2 control-label">Roles</label>
    <div class="col-md-10">
        <select class="form-control" id="roles_id" name="roles_id" required="true">
        	    <option value="" style="display: none;" {{ old('roles_id', optional($housingsSells)->roles_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select roles</option>
        	@foreach ($HousingsEggsorteds as $key => $HousingsEggsorted)
			    <option value="{{ $key }}" {{ old('roles_id', optional($housingsSells)->roles_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsEggsorted }}
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
        	    <option value="" style="display: none;" {{ old('housings_id', optional($housingsSells)->housings_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select housings</option>
        	@foreach ($HousingsEggsorteds as $key => $HousingsEggsorted)
			    <option value="{{ $key }}" {{ old('housings_id', optional($housingsSells)->housings_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsEggsorted }}
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
        	    <option value="" style="display: none;" {{ old('storages_id', optional($housingsSells)->storages_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter storages here...</option>
        	@foreach ($HousingsEggsorteds as $key => $HousingsEggsorted)
			    <option value="{{ $key }}" {{ old('storages_id', optional($housingsSells)->storages_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsEggsorted }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('storages_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
    <label for="category" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <input class="form-control" name="category" type="text" id="category" value="{{ old('category', optional($housingsSells)->category) }}" minlength="1" maxlength="10" required="true" placeholder="Enter category here...">
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" id="price" value="{{ old('price', optional($housingsSells)->price) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

