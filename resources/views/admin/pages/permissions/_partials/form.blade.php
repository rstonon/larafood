@csrf

<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $permission->name ?? old('name') }}">
</div>
{{-- <div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $permission->description ?? old('description') }}">
</div> --}}
<div class="form-group">
    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
</div>
