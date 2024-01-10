
<div class="form-group {{ $errors->has('cs_code') ? 'has-error' : '' }}">
    <label for="cs_code" class="col-md-2 control-label">Cs Code</label>
    <div class="col-md-10">
        <input class="form-control" name="cs_code" type="number" id="cs_code" value="{{ old('cs_code', optional($coas)->cs_code) }}" minlength="1" maxlength="5" required="true" placeholder="Enter cs code here...">
        {!! $errors->first('cs_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('account') ? 'has-error' : '' }}">
    <label for="account" class="col-md-2 control-label">Account</label>
    <div class="col-md-10">
        <input class="form-control" name="account" type="text" id="account" value="{{ old('account', optional($coas)->account) }}" min="1" max="40" required="true" placeholder="Enter account here...">
        {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($coas)->description) }}" minlength="1" maxlength="40" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('beginning_balance') ? 'has-error' : '' }}">
    <label for="beginning_balance" class="col-md-2 control-label">Beginning Balance</label>
    <div class="col-md-10">
        <input class="form-control" name="beginning_balance" type="number" id="beginning_balance" value="{{ old('beginning_balance', optional($coas)->beginning_balance) }}" min="0" max="9" required="true" placeholder="Enter beginning balance here...">
        {!! $errors->first('beginning_balance', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hpp') ? 'has-error' : '' }}">
    
    <label for="hpp" class="col-sm-1">HPP</label>
    <div class="col-md-10 form-inline">
        <input class="form-control" name="hpp" type="checkbox" id="hpp" value="{{ old('hpp', optional($coas)->hpp) }}" {{  ((optional($coas)->hpp) == 1 ? ' checked' : '') }}>
        {!! $errors->first('hpp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('add_information') ? 'has-error' : '' }}">
    <label for="add_information" class="col-md-2 control-label">Add Information</label>
    <div class="col-md-10">
        <input class="form-control" name="add_information" type="text" id="add_information" value="{{ old('add_information', optional($coas)->add_information) }}" maxlength="60" placeholder="Enter add information here...">
        {!! $errors->first('add_information', '<p class="help-block">:message</p>') !!}
    </div>
</div>

