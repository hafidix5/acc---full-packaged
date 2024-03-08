
<div class="form-group {{ $errors->has('date_payment') ? 'has-error' : '' }}">
    <label for="date_payment" class="col-md-2 control-label">Date Payment</label>
    <div class="col-md-10">
        <input class="form-control" name="date_payment" type="date" id="date_payment" value="{{ old('date_payment', optional($expenditures)->date_payment) }}" required="true" placeholder="Enter date payment here...">
        {!! $errors->first('date_payment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('invoices_id') ? 'has-error' : '' }}">
    <label for="invoices_id" class="col-md-2 control-label">Invoices</label>
    <div class="col-md-10">
        <select class="form-control" id="invoices_id" name="invoices_id" required="true">
        	    <option value="" style="display: none;" {{ old('invoices_id', optional($expenditures)->invoices_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select invoices</option>
        	@foreach ($Invoices as $key => $Invoice)
			    <option value="{{ $key }}" {{ old('invoices_id', optional($expenditures)->invoices_id) == $key ? 'selected' : '' }}>
			    	{{ $Invoice }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('invoices_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('coas_id') ? 'has-error' : '' }}">
    <label for="coas_id" class="col-md-2 control-label">Coas</label>
    <div class="col-md-10">
        <select class="form-control" id="coas_id" name="coas_id" required="true">
        	    <option value="" style="display: none;" {{ old('coas_id', optional($expenditures)->coas_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select coas</option>
        	@foreach ($Coas as $key => $Coa)
			    <option value="{{ $key }}" {{ old('coas_id', optional($expenditures)->coas_id) == $key ? 'selected' : '' }}>
			    	{{ $Coa }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('coas_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('criterias_id') ? 'has-error' : '' }}">
    <label for="criterias_id" class="col-md-2 control-label">Criterias</label>
    <div class="col-md-10">
        <select class="form-control" id="criterias_id" name="criterias_id" required="true">
        	    <option value="" style="display: none;" {{ old('criterias_id', optional($expenditures)->criterias_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select criterias</option>
        	@foreach ($Criterias as $key => $Criterion)
			    <option value="{{ $key }}" {{ old('criterias_id', optional($expenditures)->criterias_id) == $key ? 'selected' : '' }}>
			    	{{ $Criterion }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('criterias_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('departments_id') ? 'has-error' : '' }}">
    <label for="departments_id" class="col-md-2 control-label">Departments</label>
    <div class="col-md-10">
        <select class="form-control" id="departments_id" name="departments_id" required="true">
        	    <option value="" style="display: none;" {{ old('departments_id', optional($expenditures)->departments_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select departments</option>
        	@foreach ($Departments as $key => $Department)
			    <option value="{{ $key }}" {{ old('departments_id', optional($expenditures)->departments_id) == $key ? 'selected' : '' }}>
			    	{{ $Department }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('departments_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($expenditures)->description) }}" minlength="1" maxlength="60" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qty') ? 'has-error' : '' }}">
    <label for="qty" class="col-md-2 control-label">Qty</label>
    <div class="col-md-10">
        <input class="form-control" name="qty" type="number" id="qty" value="{{ old('qty', optional($expenditures)->qty) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter qty here...">
        {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('units_id') ? 'has-error' : '' }}">
    <label for="units_id" class="col-md-2 control-label">Units</label>
    <div class="col-md-10">
        <select class="form-control" id="units_id" name="units_id" required="true">
        	    <option value="" style="display: none;" {{ old('units_id', optional($expenditures)->units_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select units</option>
        	@foreach ($Units as $key => $Unit)
			    <option value="{{ $key }}" {{ old('units_id', optional($expenditures)->units_id) == $key ? 'selected' : '' }}>
			    	{{ $Unit }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('units_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" id="price" value="{{ old('price', optional($expenditures)->price) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('svc_charge') ? 'has-error' : '' }}">
    <label for="svc_charge" class="col-md-2 control-label">Svc Charge</label>
    <div class="col-md-10">
        <input class="form-control" name="svc_charge" type="number" id="svc_charge" value="{{ old('svc_charge', optional($expenditures)->svc_charge) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter svc charge here...">
        {!! $errors->first('svc_charge', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_charge') ? 'has-error' : '' }}">
    <label for="bank_charge" class="col-md-2 control-label">Bank Charge</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_charge" type="number" id="bank_charge" value="{{ old('bank_charge', optional($expenditures)->bank_charge) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter bank charge here...">
        {!! $errors->first('bank_charge', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discount_percentage') ? 'has-error' : '' }}">
    <label for="discount_percentage" class="col-md-2 control-label">Discount Percentage</label>
    <div class="col-md-10">
        <input class="form-control" name="discount_percentage" type="number" id="discount_percentage" value="{{ old('discount_percentage', optional($expenditures)->discount_percentage) }}" min="-9" max="9" required="true" placeholder="Enter discount percentage here...">
        {!! $errors->first('discount_percentage', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="number" id="amount" value="{{ old('amount', optional($expenditures)->amount) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter amount here...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('payment') ? 'has-error' : '' }}">
    <label for="payment" class="col-md-2 control-label">Payment</label>
    <div class="col-md-10">
        <input class="form-control" name="payment" type="number" id="payment" value="{{ old('payment', optional($expenditures)->payment) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter payment here...">
        {!! $errors->first('payment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('signed') ? 'has-error' : '' }}">
    <label for="signed" class="col-md-2 control-label">Signed</label>
    <div class="col-md-10">
        <input class="form-control" name="signed" type="text" id="signed" value="{{ old('signed', optional($expenditures)->signed) }}" minlength="1" required="true" enabled="false" placeholder="Enter signed here...">
        {!! $errors->first('signed', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('iscash') ? 'has-error' : '' }}">
    <label for="iscash" class="col-md-2 control-label">Iscash</label>
    <div class="col-md-10">
        <input class="form-control" name="iscash" type="text" id="iscash" value="{{ old('iscash', optional($expenditures)->iscash) }}" minlength="1" maxlength="1" required="true" placeholder="Enter iscash here...">
        {!! $errors->first('iscash', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
    <label for="method" class="col-md-2 control-label">Method</label>
    <div class="col-md-10">
        <input class="form-control" name="method" type="text" id="method" value="{{ old('method', optional($expenditures)->method) }}" minlength="1" maxlength="1" required="true" placeholder="Enter method here...">
        {!! $errors->first('method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('add_information') ? 'has-error' : '' }}">
    <label for="add_information" class="col-md-2 control-label">Add Information</label>
    <div class="col-md-10">
        <input class="form-control" name="add_information" type="text" id="add_information" value="{{ old('add_information', optional($expenditures)->add_information) }}" minlength="1" maxlength="50" required="true" placeholder="Enter add information here...">
        {!! $errors->first('add_information', '<p class="help-block">:message</p>') !!}
    </div>
</div>

