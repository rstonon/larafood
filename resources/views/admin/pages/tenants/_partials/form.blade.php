@csrf

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $tenant->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Plano:</label>
    <input type="text" name="plan" class="form-control" value="{{ $tenant->plan->name ?? old('plan->name') }}" disabled>
</div>
<div class="form-group">
    <label>Logo:</label>
    <input type="file" name="logo" class="form-control">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="email" name="email" class="form-control" value="{{ $tenant->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>CNPJ:</label>
    <input type="text" name="cnpj" class="form-control" value="{{ $tenant->cnpj ?? old('cnpj') }}">
</div>
<div class="form-group">
    <label>Ativo:</label>
    <select name="active" class="form-control">
        <option value="Y" @if (isset($tenant) && $tenant->active == 'Y') selected @endif >Sim</option>
        <option value="N" @if (isset($tenant) && !$tenant->active == 'N') selected @endif >Não</option>
    </select>
</div>

<hr>
<h3>Assinatura</h3>

<div class="form-group">
    <label>Data Assinatura:</label>
    <input type="date" name="subscription" class="form-control" placeholder="Data Assinatura" value="{{ $tenant->subscription ?? old('subscription') }}">
</div>
<div class="form-group">
    <label>Expira:</label>
    <input type="date" name="expires_at" class="form-control" placeholder="Expira" value="{{ $tenant->expires_at ?? old('expires_at') }}">
</div>
<div class="form-group">
    <label>Identificador:</label>
    <input type="text" name="subscription_id" class="form-control" placeholder="Identificador" value="{{ $tenant->subscription_id ?? old('subscription_id') }}">
</div>
<div class="form-group">
    <label>Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control">
        <option value="1" @if (isset($tenant) && $tenant->subscription_active) selected @endif >Sim</option>
        <option value="0" @if (isset($tenant) && !$tenant->subscription_active) selected @endif >Não</option>
    </select>
</div>
<div class="form-group">
    <label>Assinatura Cancelada?</label>
    <select name="subscription_suspended" class="form-control">
        <option value="1" @if (isset($tenant) && $tenant->subscription_suspended) selected @endif >Sim</option>
        <option value="0" @if (isset($tenant) && !$tenant->subscription_suspended) selected @endif >Não</option>
    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
</div>




