@extends('layouts.fromCard')

@section('form-title')
Nuova Canzone
@endsection

@section('form-icon')
<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="red" stroke="red" stroke-width=".5" class="bi bi-music-note" viewBox="0 0 16 16">
  <path d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
  <path fill-rule="evenodd" d="M9 3v10H8V3h1z"/>
  <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5V2.82z"/>
</svg>
@endsection

@section('form')
    <form action="{{route('storeNewSong')}}" method="POST">
        @csrf
        <div class="fs-5 my-5 ">
            <div class="row mb-3 justify-content-center">
                <label class="col-form-label col-lg-4" for="titolo">Titolo</label>
                <div class="col px-3 ">
                    <input class="form-control @error('titolo') is-invalid @enderror" type=text name="titolo" id="titolo">
                    <div class="invalid-feedback" id="error-titolo"></div>
                </div>
                
            </div>
            
            
            <div class="row mb-3">
                <label class="col-form-label col-lg-4" for="pubblicazione">Pubblicazione</label>
                <div class="col px-3">
                    <input class="form-control @error('pubblicazione') is-invalid @enderror" type=date name="pubblicazione" id="pubblicazione">
                    <div class="invalid-feedback" id="error-pubblicazione"></div>
                </div>
                
            </div>
            <div class="text-danger fs-6 text-center" id="error-artisti"></div>
            <div class="row mb-3">
                <label class="col-form-label col-lg-4" for="artisti">Artisti</label>
                <div class="form-group col px.3" id="artisti">
                    <div class="form-row py-2" id="artista">
                        <select class="form-select" name="artisti[]" id="artisti-0"> 
                            <option value="-1" selected=true> </option>
                            @foreach($singers as $singer)
                                <option value="{{$singer->id}}">{{$singer->nome}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="error-artisti-0"></div>
                    </div>
            </div>
            
                
                
            </div>
            <!--<div class="row mb-3" id="artistaSelect1">
                <label class="col-form-label col-lg-4" for="artisti1Canzone">Artista n°2</label>
                
                <div class="col px-3 ">
                    <select class="form-select" name="artista" id="artisti1Canzone" > 
                        <option value="-1" selected=true> </option>
                        <option value="1"> artista1 </option>
                        <option value="2"> artista2 </option>
                    </select>
                    <div class="invalid-feedback" id="error-artisti1"></div>
                </div>
                
            </div> -->
            <div class="mb-5">
                    <button title="Aggiungi artista" type="button" class="btn text-secondary" onclick="addArtista()" id="artistaAddButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg>
                    </button>
                    <button title="Rimuovi artista" type="button" class="btn text-secondary" onClick="removeArtista(this)" id="artistaRemoveButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                    </button> 
                </div>
            
            <button id="formSubmitButton" type=submit value=Salva class="btn btn-secondary btn-submit" > Salva </button>
        </div>
        
</form>
@endsection

@push('scripts')
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script type="text/javascript">
        
        $(document).ready(function(){
            
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }
            });

            $("#formSubmitButton").click(function(e){
                e.preventDefault();
                $('input').removeClass('is-invalid');
                $('select').removeClass('is-invalid');
                

                var titolo = $("input[name=titolo]").val();
                var pubblicazione = $("input[name=pubblicazione]").val();
                var arrayArtisti = $('select[name="artisti[]"]');
                let artisti = [];
                
                arrayArtisti.each(function(index,item){
                    //console.log(item.value);
                    if (item.value==-1){
                        //return;      ---------------------------------------->><<<<<<
                    }
                    artisti.push(item.value);
                    
                })
                
                //console.log(artisti);

                $.ajax({
                    type:'PUT',
                    url:"{{ route('storeNewSong') }}",
                    data:{titolo:titolo, pubblicazione:pubblicazione, artisti:artisti},
                    success:function(response){
                        customPopup('success','Canzone aggiunta con successo');
                    },
                    error:function(request,status,errorThrown){
                        
                        $.each(request.responseJSON.errors,function(index,item){
                            //console.log(index);
                            //console.log(item.join());
                            index = index.replace('.','-');
                            //console.log($('#'+index));
                            $('#'+index).addClass('is-invalid');
                            $('#error-'+index).text(item.join());

                        });
                    }
                });
            });
        });




        function addArtista(){
            var currentArtist = $('div#artista.form-row').last();
            
            if (currentArtist.find('select').val()==-1) {
                customPopup('notice','Seleziona un artista prima')
                return;
            }
            //console.log(currentArtist);
            currentArtistN = $('div#artista.form-row').length;
            var nuovoArtista = currentArtist.clone();
            nuovoArtista.find('select').val(-1);
            nuovoArtista.find('select').attr('id','artisti-'+currentArtistN);
            nuovoArtista.find('.invalid-feedback').attr('id','error-artisti-'+currentArtistN);
            nuovoArtista.insertAfter(currentArtist);
            //console.log(currentArtistN);
            return;
        }


        function removeArtista(callerButton){
            //console.log(callerButton);
            
            if($('div#artista.form-row').length<2){
                $('div#artista.form-row').last().find('select').val(-1);
                return;
            }
            
            
            $('div#artista.form-row').last().remove();
     
            
        }

        
    </script>
    
@endpush

