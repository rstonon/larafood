@csrf

<div class="form-group">
    <label>Identificador:</label>
    <input type="text" name="identify" class="form-control" placeholder="Identificador" value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição">{{ $table->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
</div>
