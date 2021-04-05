@csrf

<div class="form-group">
    <label>Título:</label>
    <input type="text" name="title" class="form-control" placeholder="Nome" value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>Imagem:</label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição">{{ $product->description ?? old('description') }}</textarea>
</div>

{{-- <div class="form-group">
    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
</div> --}}
