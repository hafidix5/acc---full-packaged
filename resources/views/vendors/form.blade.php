
<div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
    <label for="company_name" class="col-md-2 control-label">Company Name</label>
    <div class="col-md-10">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($vendors)->company_name) }}" minlength="1" maxlength="40" required="true" placeholder="Enter company name here...">
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_address') ? 'has-error' : '' }}">
    <label for="company_address" class="col-md-2 control-label">Company Address</label>
    <div class="col-md-10">
        <input class="form-control" name="company_address" type="text" id="company_address" value="{{ old('company_address', optional($vendors)->company_address) }}" minlength="1" maxlength="100" required="true" placeholder="Enter company address here...">
        {!! $errors->first('company_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('npwp') ? 'has-error' : '' }}">
    <label for="npwp" class="col-md-2 control-label">Npwp</label>
    <div class="col-md-10">
        <input class="form-control" name="npwp" type="text" id="npwp" value="{{ old('npwp', optional($vendors)->npwp) }}" minlength="1" maxlength="20" required="true" placeholder="Enter npwp here...">
        {!! $errors->first('npwp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sales_name') ? 'has-error' : '' }}">
    <label for="sales_name" class="col-md-2 control-label">Sales Name</label>
    <div class="col-md-10">
        <input class="form-control" name="sales_name" type="text" id="sales_name" value="{{ old('sales_name', optional($vendors)->sales_name) }}" minlength="1" maxlength="30" required="true" placeholder="Enter sales name here...">
        {!! $errors->first('sales_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
    <label for="contact" class="col-md-2 control-label">Contact</label>
    <div class="col-md-10">
        <input class="form-control" name="contact" type="text" id="contact" value="{{ old('contact', optional($vendors)->contact) }}" minlength="1" maxlength="12" required="true" placeholder="Enter contact here...">
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
    <label for="bank_name" class="col-md-2 control-label">Bank Name</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_name" type="text" id="bank_name" value="{{ old('bank_name', optional($vendors)->bank_name) }}" maxlength="15" placeholder="Enter bank name here...">
        {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('account_number') ? 'has-error' : '' }}">
    <label for="account_number" class="col-md-2 control-label">Account Number</label>
    <div class="col-md-10">
        <input class="form-control" name="account_number" type="text" id="account_number" value="{{ old('account_number', optional($vendors)->account_number) }}" min="0" max="20" placeholder="Enter account number here...">
        {!! $errors->first('account_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
    <label for="payment_method" class="col-md-2 control-label">Payment Method</label>
    <div class="col-md-10">
        <input class="form-control" name="payment_method" type="text" id="payment_method" value="{{ old('payment_method', optional($vendors)->payment_method) }}" minlength="1" maxlength="10" required="true" placeholder="Enter payment method here...">
        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

