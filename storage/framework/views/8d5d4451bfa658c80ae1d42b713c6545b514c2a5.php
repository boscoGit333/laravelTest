<?php $__env->startSection('main'); ?>

<div class="container mb-5">
  <form class="" method="GET" action="<?php echo e(route('listaCanzoniFilter')); ?>">
    

    <div class="row form-row py-2 justify-content-center">
      <div class="col-6">
        <select name="artista" class="form-select">
          <option value='all' selected disabled hidden>Filtra per cantante...</option>
          <option value='all'>Tutti</option>
          <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e(urlencode($singer->nome)); ?>"><?php echo e($singer->nome); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <select> 
      </div>
      <div class="col-3">
        <button type="submit" class="btn btn-secondary">Filtra</button>
      </div>
    </div>
  </form>
</div>




<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Titolo</th>
      <th scope="col">Data di pubblicazione</th>
      <th scope="col">Artisti</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row">
          
          <?php
          $titolo = $song->titolo;
            if(strlen($titolo) > 50){
              echo substr($titolo,0,50);
              echo '...';
            }
            else echo $titolo
          ?>          
        </th>
        <td><?php echo e($song->pubblicazione); ?></td>
        <td>
          
          <?php $__currentLoopData = $song->singers()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$loop->last): ?>
            <?php echo e($singer->nome); ?>, 
            <?php else: ?>
            <?php echo e($singer->nome); ?>

            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td>
          
          <a href="<?php echo e(route('formEditSong',$song->id)); ?>" class="my-1 btn btn-outline-secondary" title="Modifica" aria-label="Modifica"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </a>

          <buttton onClick="deleteSong(this,<?php echo e($song->id); ?>)" type=button class="my-1 btn btn-outline-danger" title="Elimina" aria-label="Elimina"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
            </svg>
          </button>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>


    
 

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<script type="text/javascript">

$(document).ready(function(){
            
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });

});
          
function deleteSong(item,songid){
  //console.log(item);
  if (confirm("Questa canzone sarà cancellata")==false){
    return;
  }
  $.ajax({
          type:'DELETE',
          url:"<?php echo e(route('deleteSong')); ?>",
          data:{songid:songid},
          success:function(response){
              customPopup('notice','Canzone eliminata');
              item.parentElement.parentElement.remove();
          },
          error:function(request,status,errorThrown){
              //console.log(request,status,errorThrown);
              customPopup('danger','Operazione non riuscita');
          }
      });
}
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mau/Documents/laraveltest/laraveltest/laraveltestv2/resources/views/listaCanzoni.blade.php ENDPATH**/ ?>