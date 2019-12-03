
   <div class="form-group">
    <label for="name">Nome  Produto</label>
    <input type="text" name="name" id="name" placeholder="Digite o nome da categoria" value="{{ isset($product) ?  old('name',$product->name) : old('name')}}" class="form-control">
    <p class="text-danger"><b>{{$errors->first('name')}}</b></p>
</div>

<div class="form-group">
    <label for="price">Categoria</label>
    {{Form::select('cod_category',$categories,$product->cod_category ?? null,['placeholder' => 'Escolha una categoria','class'=>'form-control'])}}
    <p class="text-danger"><b>{{$errors->first('cod_category')}}</b></p>
</div>


<div class="form-group">
    <label for="price">Preço do produto</label>
    <input type="number" name="price" id="price" placeholder="Digite o nome da categoria" value="{{ isset($product) ?  old('name',$product->price) : old('price')}}" class="form-control">
    <p class="text-danger"><b>{{$errors->first('price')}}</b></p>
</div>


<div class="form-group">
    <label for="description">Descrição Produto</label>
    <textarea name="description" id="description" class="form-control" cols="30" rows="10">
        {{ isset($product) ? old('description',$product->description) : old('description')  }}
    </textarea>
    <p class="text-danger"><b>{{$errors->first('description')}}</b></p>
</div>