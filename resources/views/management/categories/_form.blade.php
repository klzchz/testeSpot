
   <div class="form-group">
    <label for="name">Nome Categoria</label>
    <input type="text" name="name" id="name" placeholder="Digite o nome da categoria" value="{{ isset($category) ?  old('name',$category->name) : old('name')}}" class="form-control">
    <p class="text-danger"><b>{{$errors->first('name')}}</b></p>
</div>

<div class="form-group">
    <label for="description">Descrição Categoria</label>
    <textarea name="description" id="description" class="form-control" cols="30" rows="10">
        {{ isset($category) ? old('description',$category->description) : old('description')  }}
    </textarea>
    <p class="text-danger"><b>{{$errors->first('description')}}</b></p>
</div>