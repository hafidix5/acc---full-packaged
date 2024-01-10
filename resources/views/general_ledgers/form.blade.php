
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

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($generalLedgers)->date) }}" required="true" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
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

