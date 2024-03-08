
<div class="form-group {{ $errors->has('expenditures_id') ? 'has-error' : '' }}">
    <label for="expenditures_id" class="col-md-2 control-label">Expenditures</label>
    <div class="col-md-10">
        <select class="form-control" id="expenditures_id" name="expenditures_id" required="true">
        	    <option value="" style="display: none;" {{ old('expenditures_id', optional($generalLedgers)->expenditures_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select expenditures</option>
        	@foreach ($Expenditures as $key => $Expenditure)
			    <option value="{{ $key }}" {{ old('expenditures_id', optional($generalLedgers)->expenditures_id) == $key ? 'selected' : '' }}>
			    	{{ $Expenditure }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('expenditures_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('coas_id') ? 'has-error' : '' }}">
    <label for="coas_id" class="col-md-2 control-label">Coas</label>
    <div class="col-md-10">
        <select class="form-control" id="coas_id" name="coas_id" required="true">
        	    <option value="" style="display: none;" {{ old('coas_id', optional($generalLedgers)->coas_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select coas</option>
        	@foreach ($Coas as $key => $Coa)
			    <option value="{{ $key }}" {{ old('coas_id', optional($generalLedgers)->coas_id) == $key ? 'selected' : '' }}>
			    	{{ $Coa }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('coas_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('information') ? 'has-error' : '' }}">
    <label for="information" class="col-md-2 control-label">Information</label>
    <div class="col-md-10">
        <input class="form-control" name="information" type="text" id="information" value="{{ old('information', optional($generalLedgers)->information) }}" minlength="1" maxlength="50" required="true" placeholder="Enter information here...">
        {!! $errors->first('information', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('debet') ? 'has-error' : '' }}">
    <label for="debet" class="col-md-2 control-label">Debet</label>
    <div class="col-md-10">
        <input class="form-control" name="debet" type="number" id="debet" value="{{ old('debet', optional($generalLedgers)->debet) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter debet here...">
        {!! $errors->first('debet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('credit') ? 'has-error' : '' }}">
    <label for="credit" class="col-md-2 control-label">Credit</label>
    <div class="col-md-10">
        <input class="form-control" name="credit" type="number" id="credit" value="{{ old('credit', optional($generalLedgers)->credit) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter credit here...">
        {!! $errors->first('credit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

