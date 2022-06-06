{{-- formulario para create y edit --}}

    <h1>{{ $modo }} plato </h1>

    @if(count($errors)>0)

        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            
            @endforeach
            </ul>
        </div>
    
    @endif

    <div class="form-group">

    <label for="nombre">Nombre</label><br>
    <input type="text" class="form-control" name="nombre" value="{{ isset($platos->nombre)?$platos->nombre:'' }}" id="nombre"><br><br>

    </div>

    <div class="form-group">
    <label for="categoria">Categoría</label><br>
    <input type="text" class="form-control"  name="categoria" value="{{ isset($platos->categoria)?$platos->categoria:'' }}" id="categoria"><br><br>

    </div>

    <div class="form-group">
    <label for="precio">Precio</label><br>
    <input type="number" class="form-control" name="precio" value="{{ isset($platos->precio)?$platos->precio:'' }}" id="precio"><br><br>
   
    </div>

    <div class="form-group">
    <label for="foto">Foto</label><br>

    @if(isset($platos->foto))
    <img src="{{ asset('storage').'/'.$platos->foto }}" class="img-thumbnail img-fluid" width="100" alt="">
    @endif

    <input type="file" class="form-control" name="foto" value="" id="foto"><br><br>
   
    </div>

    <input type="submit" class="btn btn-success" value="Guardar">

    <a href="{{url('platos/')}}" class="btn btn-primary">Regresar</a><br><br>
