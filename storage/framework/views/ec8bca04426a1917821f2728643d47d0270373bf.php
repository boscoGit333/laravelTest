<?php $__env->startSection('main'); ?>

<div class="card text-center m-5 bg-dark w-50 h-75 container border-secondary text-secondary">
        
                <div class="card-header d-flex align-items-center border-secondary">
                    
                    <span class="p-2" style="min-width:64px; height:auto;; border-radius:100%; color:red; background-image: radial-gradient(rgba(255,0,0,.5) 5%, transparent )">
                    <?php $__env->startSection('form-icon'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" stroke="red" fill="none" width="64" height="64" viewBox="0 0 24 24" stroke-width=".5" class="" >
                            <path d="M15.526 11.409c-1.052.842-7.941 6.358-9.536 7.636l-2.697-2.697 7.668-9.504 1.422 1.422-6.405 7.938.16.16 7.965-6.378 1.423 1.423zm-.72-8.453c-.437.437-.665.89-.791 1.285l4.123 4.123c.392-.126.845-.356 1.283-.793 1.272-1.272 1.272-3.343 0-4.615-1.273-1.274-3.338-1.277-4.615 0zm6.029-1.414c2.055 2.056 2.055 5.388 0 7.443-1.367 1.367-2.885 1.482-3.369 1.536l-5.61-5.61c.066-.527.181-2.013 1.536-3.369 2.056-2.056 5.388-2.056 7.443 0zm-4.887 21.506l-1.462.952c-1.505-2.309-2.449-2.773-3.485-2.773-1.602 0-2.304 1.093-3.889 2.088-1.86 1.167-3.82.559-4.795-.645-.85-1.049-1.093-2.742.279-4.157l1.126 1.091.125.125c-.841.871-.347 1.631-.175 1.843.477.588 1.466.922 2.512.266 1.478-.928 2.524-2.355 4.816-2.355 2.179-.001 3.554 1.425 4.948 3.565z"/>
                        </svg>
                    <?php echo $__env->yieldSection(); ?>                            

                    </span>

                    <h2 class="col card-title" style="color:FireBrick"><?php echo $__env->yieldContent('form-title','Titolo'); ?></h2>
                </div>
                <div classs="card-body">
                    <?php echo $__env->yieldContent('form'); ?>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mau/Documents/laraveltest/laraveltest/laraveltestv2/resources/views/layouts/fromCard.blade.php ENDPATH**/ ?>