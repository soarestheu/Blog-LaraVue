<?php $__env->startSection('content'); ?>
    <pagina tamanho="12" >
        <painel titulo="Artigos">
            <div class="row">

                <p>
                    
                    <form action="<?php echo e(route('site')); ?>" class="form-inline text-center" method="get">
                        <input type="search" name="busca" id="" class="form-control" placeholder="Buscar" value="<?php echo e(isset($busca) ? $busca : ""); ?>" >
                        <button class="btn btn-info">Buscar</button>
                    </form>

                </p>

                <?php $__currentLoopData = $lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <artigocard 
                    imagem="https://fortissima.com.br/wp-content/uploads/2016/03/bloco-de-anotacoes-doutissima-istock.jpg"
                    titulo="<?php echo e(str_limit($value->titulo,25,'...')); ?>"
                    descricao="<?php echo e(str_limit($value->descricao,40,'...')); ?>"
                    link="<?php echo e(route('artigo',[$value->id, str_slug($value->titulo)])); ?>"
                    data="<?php echo e($value->data); ?> "
                    autor="<?php echo e($value->autor); ?>"
                    sm="6"
                    md="4"
                    ></artigocard> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            </div>    

            <div align="center">
                <?php echo e($lista); ?>

            </div>
        </painel>
    </pagina>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>