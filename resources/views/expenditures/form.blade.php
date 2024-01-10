
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($expenditures)->date) }}" required="true" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {{ $errors->has('products_id') ? 'has-error' : '' }}">
    <label for="products_id" class="col-md-2 control-label">Products</label>
    <div class="col-md-10">
        <select class="form-control" id="products_id" name="products_id" required="true">
        	    <option value="" style="display: none;" {{ old('products_id', optional($expenditures)->products_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select products</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('products_id', optional($expenditures)->products_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('products_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('subjects_id') ? 'has-error' : '' }}">
    <label for="subjects_id" class="col-md-2 control-label">Subjects</label>
    <div class="col-md-10">
        <select class="form-control" id="subjects_id" name="subjects_id" required="true">
        	    <option value="" style="display: none;" {{ old('subjects_id', optional($expenditures)->subjects_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select subjects</option>
        	@foreach ($Subjects as $key => $Subject)
			    <option value="{{ $key }}" {{ old('subjects_id', optional($expenditures)->subjects_id) == $key ? 'selected' : '' }}>
			    	{{ $Subject }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('subjects_id', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {{ $errors->has('vendors_id') ? 'has-error' : '' }}">
    <label for="vendors_id" class="col-md-2 control-label">Vendors</label>
    <div class="col-md-10">
        <select class="form-control" id="vendors_id" name="vendors_id" required="true">
        	    <option value="" style="display: none;" {{ old('vendors_id', optional($expenditures)->vendors_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select vendors</option>
        	@foreach ($Vendors as $key => $Vendor)
			    <option value="{{ $key }}" {{ old('vendors_id', optional($expenditures)->vendors_id) == $key ? 'selected' : '' }}>
			    	{{ $Vendor }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('vendors_id', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {{ $errors->has('signed') ? 'has-error' : '' }}">
    <label for="signed" class="col-md-2 control-label">Signed</label>
    <div class="col-md-10">
        <input class="form-control" name="signed" type="text" id="signed" value="{{ old('signed', optional($expenditures)->signed) }}" minlength="1" required="true" placeholder="Enter signed here...">
        {!! $errors->first('signed', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : '' }}">
    <label for="invoice_number" class="col-md-2 control-label">Invoice Number</label>
    <div class="col-md-10">
        <input class="form-control" name="invoice_number" type="text" id="invoice_number" value="{{ old('invoice_number', optional($expenditures)->invoice_number) }}" min="1" max="20" required="true" placeholder="Enter invoice number here...">
        {!! $errors->first('invoice_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('add_information') ? 'has-error' : '' }}">
    <label for="add_information" class="col-md-2 control-label">Add Information</label>
    <div class="col-md-10">
        <input class="form-control" name="add_information" type="number" id="add_information" value="{{ old('add_information', optional($expenditures)->add_information) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter add information here...">
        {!! $errors->first('add_information', '<p class="help-block">:message</p>') !!}
    </div>
</div>

