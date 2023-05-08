<?php $__env->startSection('form-title'); ?>
Modifica Canzone
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form-icon'); ?>
<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="red" stroke=red stroke-width=.5 class="bi bi-music-note-list" viewBox="0 0 16 16">
  <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
  <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
  <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
  <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
</svg>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <form action="<?php echo e(route('storeEditSong',$song->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="fs-5 my-5 ">
            <div class="row mb-3 justify-content-center">
                <label class="col-form-label col-lg-4" for="titolo">Titolo</label>
                <div class="col px-3 ">
                    <input class="form-control <?php $__errorArgs = ['titolo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type=text name="titolo" id="titolo" value="<?=old('titolo')?:$song->titolo?>">
                    <div class="invalid-feedback" id="error-titolo"><?php $__errorArgs = ['titolo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                </div>
                
            </div>
            
            
            <div class="row mb-3">
                <label class="col-form-label col-lg-4" for="pubblicazione">Pubblicazione</label>
                <div class="col px-3">
                    <input class="form-control <?php $__errorArgs = ['pubblicazione'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type=date name="pubblicazione" id="pubblicazione" value="<?php echo e(old('pubblicazione  ')?:$song->pubblicazione); ?>">
                    <div class="invalid-feedback" id="error-pubblicazione"></div>
                </div>
                
            </div>
            <div class="text-danger fs-6 text-center" id="error-artisti"></div>
            <div class="row mb-3">
                <label class="col-form-label col-lg-4" for="artisti">Artisti</label>
                <div class="form-group col px.3" id="artisti">

                <?php if(old('artisti')): ?>
                    
                    <?php $__currentLoopData = old('artisti'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row py-2" id="artista">
                            <div class="col-10">
                                <select class="form-select  <?= $errors->has('artisti.'.$loop->index) ? 'is-invalid' : ''?> " name="artisti[]" id="artisti-<?php echo e($loop->index); ?>"> 
                                <option value="-1"> </option>
                                    <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <option <?= ($artist != $singer->id) ?: 'selected=true' ?> value="<?php echo e($singer->id); ?>"><?php echo e($singer->nome); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback" id="error-artisti-<?php echo e($loop->index); ?>"><?= $errors->first('artisti.'.$loop->index)?> </div>
                            </div>
                            
                           
                            <div class="col-1">
                                <button title="Rimuovi artista" type="button" class="btn text-secondary" onClick="removeArtista(this)" id="artistaRemoveButton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                                </button> 
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $song->singers()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row py-2" id="artista">
                            <div class="col-10">
                                <select class="form-select" name="artisti[]" id="artisti-<?php echo e($loop->index); ?>"> 
                                <option value="-1"> </option>
                                    <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <option <?= ($artist->id != $singer->id) ?: 'selected=true' ?> value="<?php echo e($singer->id); ?>"><?php echo e($singer->nome); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <button title="Rimuovi artista" type="button" class="btn text-secondary" onClick="removeArtista(this)" id="artistaRemoveButton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                                </button> 
                            </div>
                            <div class="invalid-feedback" id="error-artisti-<?php echo e($loop->index); ?>"></div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
                    
                </div>
            
            <button id="formSubmitButton" type=submit value=Salva class="btn btn-secondary btn-submit" > Salva </button>
        </div>
        
</form>

<?php if($success): ?>

<div id = "alert-edit-success"  class="w-25 mx-auto fixed-bottom alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:22%">
  <?php echo e($success); ?>

  <button onClick="$('#alert-edit-success').alert('close')" type="button" class="btn close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  

    <script type="text/javascript">
        
        function closeAlert(item){
            console.log(item);
            item.parentElement.alert('close');
        }
        
        
        function addArtista(){
            var currentArtist = $('div#artista.row').last();
            console.log(currentArtist.find('select').val());
            if (currentArtist.find('select').val()==-1) {
                customPopup('notice','Seleziona un artista prima')
                return;
            }
            //console.log(currentArtist);
            currentArtistN = $('div#artista.row').length;;
            var nuovoArtista = currentArtist.clone();
            nuovoArtista.find('select').val(-1);
            nuovoArtista.find('select').attr('id','artisti-'+currentArtistN);
            nuovoArtista.find('.invalid-feedback').attr('id','error-artisti-'+currentArtistN);
            nuovoArtista.insertAfter(currentArtist);
            //console.log(currentArtistN);
            return;
        }


        function removeArtista(callerButton){

            //console.log(callerButton.parentElement.parentElement);
            //console.log($('div#artista.form-row').length);
            if($('div#artista.row').length<2){
                $('div#artista.row').last().find('select').val(-1);
                return;
            }
            
            
            callerButton.parentElement.parentElement.remove();
            
            
        }

        
    </script>
    
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.fromCard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mau/Documents/laraveltest/laraveltest/laraveltestv2/resources/views/formEditSong.blade.php ENDPATH**/ ?>