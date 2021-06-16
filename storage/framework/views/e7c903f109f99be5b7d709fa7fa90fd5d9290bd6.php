<?php $__env->startSection('content'); ?>
    <pagina tamanho="12" >

        <?php if($errors->all()): ?>
            <div class="alert alert-danger alert-dismissible text-center" role="center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span> </button>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><strong><?php echo e($value); ?></strong></li> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista=" <?php echo e($listaMigalhas); ?> " ></migalhas>

            
            <tabela-lista 
                v-bind:titulos="['#','Título','Descrição', 'Autor','data']"
                v-bind:itens="<?php echo e(json_encode($listaArtigos)); ?>" 
                ordem="desc" ordemCol="1"   
                criar="#criar"
                detalhe="/admin/artigos/"
                editar="/admin/artigos/"
                deletar="/admin/artigos/"
                token="<?php echo e(csrf_token()); ?>" 
                modal="sim"
            ></tabela-lista>
            <div align="center">
                <?php echo e($listaArtigos->links()); ?>

            </div>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="<?php echo e(route('artigos.store')); ?>" method="post" enctype="" token="<?php echo e(csrf_token()); ?>" >
            
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" value="<?php echo e(old('titulo')); ?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" value="<?php echo e(old('descricao')); ?>" >
            </div>
            
            <div class="form-group">
                <label for="addConteudo">Conteúdo</label><br/>
                <textarea name="conteudo" id="addConteudo" class="form-control" value="<?php echo e(old('conteudo')); ?>" ></textarea>
                
                
            </div>
            <div class="form-group">
                <label for="descricao">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="<?php echo e(old('data')); ?>">
            </div>
        </formulario>

        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar" titulo="Editar">
            <formulario id="formAtualizar" css="" v-bind:action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="<?php echo e(csrf_token()); ?>" >
                
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" v-model="$store.state.item.titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" v-model="$store.state.item.descricao" placeholder="Descrição">
                </div>

                <div class="form-group">
                    <label for="editConteudo">Conteúdo</label><br/>
                    <textarea name="conteudo" id="editConteudo" class="form-control" v-model="$store.state.item.conteudo"></textarea>
                </div>
                <div class="form-group">
                    <label for="descricao">Data</label>
                    <input type="date" name="data" id="data" class="form-control" v-model="$store.state.item.data" >
                </div>

            </formulario>

            <span slot="botoes">
                <button form="formAtualizar" class="btn btn-info" >Atualizar</button>
            </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
            <p> {{$store.state.item.descricao}} </p>
            <p> {{$store.state.item.conteudo}} </p>
    </modal>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>