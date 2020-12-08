@csrf

<div class="form-group">
    <label>Nome*:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
</div>
