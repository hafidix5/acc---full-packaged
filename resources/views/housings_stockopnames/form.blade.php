
<div class="form-group {{ $errors->has('storages_id') ? 'has-error' : '' }}">
    <label for="storages_id" class="col-md-2 control-label">Storages</label>
    <div class="col-md-10">
        <select class="form-control" id="storages_id" name="storages_id" required="true">
        	    <option value="" style="display: none;" {{ old('storages_id', optional($housingsStockopnames)->storages_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter storages here...</option>
        	@foreach ($HousingsStorages as $key => $HousingsStorage)
			    <option value="{{ $key }}" {{ old('storages_id', optional($housingsStockopnames)->storages_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsStorage }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('storages_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('materials_id') ? 'has-error' : '' }}">
    <label for="materials_id" class="col-md-2 control-label">Materials</label>
    <div class="col-md-10">
        <select class="form-control" id="materials_id" name="materials_id" required="true">
        	    <option value="" style="display: none;" {{ old('materials_id', optional($housingsStockopnames)->materials_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select materials</option>
        	@foreach ($HousingsMaterials as $key => $HousingsMaterial)
			    <option value="{{ $key }}" {{ old('materials_id', optional($housingsStockopnames)->materials_id) == $key ? 'selected' : '' }}>
			    	{{ $HousingsMaterial }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('materials_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
    <label for="method" class="col-md-2 control-label">Method</label>
    <div class="col-md-10">
        <input class="form-control" name="method" type="text" id="method" value="{{ old('method', optional($housingsStockopnames)->method) }}" minlength="1" maxlength="15" required="true" placeholder="Enter method here...">
        {!! $errors->first('method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($housingsStockopnames)->status) }}" minlength="1" maxlength="15" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }}">
    <label for="bank" class="col-md-2 control-label">Bank</label>
    <div class="col-md-10">
        <input class="form-control" name="bank" type="text" id="bank" value="{{ old('bank', optional($housingsStockopnames)->bank) }}" minlength="1" maxlength="10" required="true" placeholder="Enter bank here...">
        {!! $errors->first('bank', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pic_id') ? 'has-error' : '' }}">
    <label for="pic_id" class="col-md-2 control-label">Pic</label>
    <div class="col-md-10">
        <select class="form-control" id="pic_id" name="pic_id" required="true">
        	    <option value="" style="display: none;" {{ old('pic_id', optional($housingsStockopnames)->pic_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select pic</option>
        	@foreach ($pics as $key => $pic)
			    <option value="{{ $key }}" {{ old('pic_id', optional($housingsStockopnames)->pic_id) == $key ? 'selected' : '' }}>
			    	{{ $pic }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('pic_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

