@extends('layouts.fromCard')

@section('form-title')
Nuovo Cantante
@endsection

@section('form-icon')
<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="red" stroke=red stroke-width=.5 class="bi bi-person-add" viewBox="0 0 24 24">
<path d="M15.526 11.409c-1.052.842-7.941 6.358-9.536 7.636l-2.697-2.697 7.668-9.504 1.422 1.422-6.405 7.938.16.16 7.965-6.378 1.423 1.423zm-.72-8.453c-.437.437-.665.89-.791 1.285l4.123 4.123c.392-.126.845-.356 1.283-.793 1.272-1.272 1.272-3.343 0-4.615-1.273-1.274-3.338-1.277-4.615 0zm6.029-1.414c2.055 2.056 2.055 5.388 0 7.443-1.367 1.367-2.885 1.482-3.369 1.536l-5.61-5.61c.066-.527.181-2.013 1.536-3.369 2.056-2.056 5.388-2.056 7.443 0zm-4.887 21.506l-1.462.952c-1.505-2.309-2.449-2.773-3.485-2.773-1.602 0-2.304 1.093-3.889 2.088-1.86 1.167-3.82.559-4.795-.645-.85-1.049-1.093-2.742.279-4.157l1.126 1.091.125.125c-.841.871-.347 1.631-.175 1.843.477.588 1.466.922 2.512.266 1.478-.928 2.524-2.355 4.816-2.355 2.179-.001 3.554 1.425 4.948 3.565z"/>
</svg>
@endsection

@section('form')
    <form action="{{route('storeNewSinger')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="fs-5 my-5 ">
            <div class="row mb-3 justify-content-center">
                <label class="col-form-label col-lg-4" for="nome">Nome</label>
                <div class="col px-3 ">
                    <input class="form-control @error('nome') is-invalid @enderror" type=text name="nome" id="nome" value="{{old('nome')}}">
                    <div class="invalid-feedback" id="error-nome">@error('nome'){{$message}}@enderror</div>
                </div>
                
            </div>
            
            
            <div class="row mb-3">
                <label class="col-form-label col-lg-4" for="nascita">Data di nascita</label>
                <div class="col px-3">
                    <input class="form-control @error('nascita') is-invalid @enderror" type=date name="nascita" id="nascita" value="{{old('nascita')}}">
                    <div class="invalid-feedback" id="error-nascita">@error('nascita'){{$message}}@enderror</div>
                </div>
                
            </div>
           
            <div class="row mb-3">
                <label class="col-form-label col-lg-4" for="nascita">Sesso</label>
                <div class="col px-3">
                    <select class="form-select @error('sesso') is-invalid @enderror" type=text name="sesso" id="sesso" value="{{old('sesso')}}">
                        <option value="Maschio">Maschio</option>
                        <option value="Femmina">Femmina</option>
                    </select>
                    <div class="invalid-feedback" id="error-sesso">@error('sesso'){{$message}}@enderror</div>
                </div>
                
            </div>
            
            <button id="formSubmitButton" type=submit value=Salva class="btn btn-secondary btn-submit" > Salva </button>
        </div>
        
</form>
@endsection
