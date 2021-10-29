@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header"><strong class="h5">Postular</strong></div>
          <div class="card-body">
            <form method="POST" action="{{route('empresa.store')}}">
              @csrf
              <div class="row my-3">
                <label for=""class="col-md-4 text-md-right">Nombre Corto</label>
                <div class="col-md-6">
                    <input type="text" class="form-control  @error('short_name') is-invalid @enderror" name="short_name"  
                    value="{{old('short_name')}}"  id="" aria-describedby="helpId" placeholder="">
                    @error('short_name')
                    <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                    @enderror
                </div>
              </div>

    <!--
    <div class="mb-3">
      <label for="" class="form-label">Consultor</label>
      <select class="form-control" name="adviser" id="">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
   
    </div>
    
-->
<div class="row my-3">
  <label for="" class="col-md-4 text-md-right">Logo</label>
  <div class="col-md-6">
  <input type="text" class="form-control @error('logo') is-invalid @enderror " name="logo" value="{{old('logo')}}"  id="" aria-describedby="helpId" placeholder="">
  @error('logo')
                          <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
                        @enderror
                        </div>
</div>
<div class="row my-3">{!! Form::label('project_id', 'Proyecto', ['class' => 'col-md-4 text-md-right']) !!}
  <div class="col-md-6">
  {!! Form::select ('project_id', $project, null, ['class' => 'form-control ' . ($errors->has('project_id') ? ' is-invalid' : null)]) !!}
  @error('project_id')
  <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
@enderror
  </div>
    </div>

    <div class="row my-3">
      <label for=""class="col-md-4 text-md-right">Telefono</label>
      <div class="col-md-6">
      <input type="number"class="form-control   @error('phone') is-invalid @enderror" name="phone" value=" {{old('phone')}}" id="" aria-describedby="helpId" placeholder="">        
      @error('phone')
      <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
    @enderror
    </div>
    </div>
    <div class="row my-3">
      <label for=""class="col-md-4 text-md-right">Correo Electronico</label>
      <div class="col-md-6">
      <input type="email"
      class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="" aria-describedby="helpId" placeholder="">
      @error('email')
      <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
    @enderror
    </div>
    </div>
 
    <div class="row my-3">
      <label for=""class="col-md-4 text-md-right">Nombre largo</label>
      <div class="col-md-6">
      <input type="text"
      class="form-control   @error('long_name') is-invalid @enderror" name="long_name"  value=" {{old('long_name')}}" id="" aria-describedby="helpId" placeholder="">
      @error('long_name')
      <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
    @enderror
    </div>
    </div>
    <div class="row my-3">
      <label for=""class="col-md-4 text-md-right">Direccion</label>
      <div class="col-md-6">
      <input type="text"
      class="form-control  @error('address') is-invalid @enderror" name="address" value=" {{old('long_name')}}" id="" aria-describedby="helpId" placeholder="">
      @error('address')
      <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
    @enderror
   </div>
    </div>
    <div class="row my-3">{!! Form::label('adviser_id', 'Consultor',['class' => 'col-md-4 text-md-right']) !!}
      <div class="col-md-6">
      {!! Form::select ('adviser_id', $adviser, null, ['class' => 'form-control ' . ($errors->has('adviser_id') ? ' is-invalid' : null)]) !!}
        
        @error('adviser_id')
        <div class="row"><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
      @enderror
      </div>
    </div>
<!--
    <div class="mb-3">
      <label for="" class="form-label">Socios</label>
      <input type="text"
        class="form-control" name="partners" id="" aria-describedby="helpId" placeholder="">
   
    </div>
-->
    <div class="row my-3">
      <label for=""class="col-md-4 text-md-right">tipo sociedad</label>
      <div class="col-md-6">
      <input type="text"
      class="form-control  @error('type') is-invalid @enderror" name="type" value="{{old('type')}}" id="" aria-describedby="helpId" placeholder="" >
      @error('type')
      <div class=""><small class="text-danger col-md" style="font-weight: bold;"">{{$message}}</small></div>         
    @enderror
     </div>
    </div>
 
     <input name="" id="" class="btn btn-primary"  style="display: block; margin: 0 auto;"  type="submit" value="Guardar">
    <!--
    <div class="mb-3">
     <label >Logo</label>
     <br>
     <input  type="file" name="logo" id=""  >
     </div>    -->
  
    
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
