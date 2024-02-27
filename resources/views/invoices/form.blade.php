
<div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
    <label for="id" class="col-md-2 control-label">Invoice Number</label>
    <div class="col-md-10">
        <input class="form-control" name="id" type="text" id="id" value="{{ old('id', optional($invoices)->id) }}" required="true" placeholder="Enter invoice number here...">
        {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="date" id="date" value="{{ old('date', optional($invoices)->date) }}" required="true" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_invoice') ? 'has-error' : '' }}">
    <label for="file_invoice" class="col-md-2 control-label">File Invoice</label>
    <div class="col-md-10">
        <input class="form-control" name="file_invoice" type="file" id="file_invoice" value="{{ old('file_invoice', optional($invoices)->file_invoice) }}" minlength="1" maxlength="100" required="true" placeholder="Enter file invoice here...">
        {!! $errors->first('file_invoice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('vendors_id') ? 'has-error' : '' }}">
    <label for="vendors_id" class="col-md-2 control-label">Vendors</label>
    <div class="col-md-10">
        <select class="form-control" id="vendors_id" name="vendors_id" required="true">
        	    <option value="" style="display: none;" {{ old('vendors_id', optional($invoices)->vendors_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select vendors</option>
        	@foreach ($Vendors as $key => $Vendor)
			    <option value="{{ $key }}" {{ old('vendors_id', optional($invoices)->vendors_id) == $key ? 'selected' : '' }}>
			    	{{ $Vendor }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('vendors_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

