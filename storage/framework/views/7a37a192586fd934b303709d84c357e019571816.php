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

        <painel titulo="Lista de Usuários">
            <migalhas v-bind:lista=" <?php echo e($listaMigalhas); ?> " ></migalhas>

            
            <tabela-lista 
                v-bind:titulos="['#','Nome','E-mail']"
                v-bind:itens="<?php echo e(json_encode($listaModelo)); ?>" 
                ordem="desc" ordemCol="1"   
                criar="#criar"
                detalhe="/admin/usuarios/"
                editar="/admin/usuarios/"
                deletar="/admin/usuarios/"
                token="<?php echo e(csrf_token()); ?>" 
                modal="sim"
            ></tabela-lista>
            <div align="center">
                <?php echo e($listaModelo->links()); ?>

            </div>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="<?php echo e(route('usuarios.store')); ?>" method="post" enctype="" token="<?php echo e(csrf_token()); ?>" >
            
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="<?php echo e(old('name')); ?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="<?php echo e(old('email')); ?>" >
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo e(old('password')); ?>">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <select class="form-control" name="autor" id="autor">
                    <option <?php echo e((old('autor') && old('autor') == 'N' ? 'selected':'')); ?> value="N">Não</option>
                    <option <?php echo e((old('autor') && old('autor') == 'S' ? 'selected':'')); ?> value="S">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="admin">Admin</label>
                <select class="form-control" name="admin" id="admin">
                    <option <?php echo e((old('admin') && old('admin') == 'N' ? 'selected':'')); ?> value="N">Não</option>
                    <option <?php echo e((old('admin') && old('admin') == 'S' ? 'selected':'')); ?> value="S">Sim</option>
                </select>
            </div>

        </formulario>

        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar" titulo="Editar">
            <formulario id="formAtualizar" css="" v-bind:action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="<?php echo e(csrf_token()); ?>" >
                
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" v-model="$store.state.item.name" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" v-model="$store.state.item.email" placeholder="E-mail">
                </div>

                
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <select class="form-control" name="autor" id="autor" v-model="$store.state.item.autor">
                        <option value="N">Não</option>
                        <option value="S">Sim</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="admin">Admin</label>
                    <select class="form-control" name="admin" id="admin" v-model="$store.state.item.admin">
                        <option value="N">Não</option>
                        <option value="S">Sim</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>

            </formulario>

            <span slot="botoes">
                <button form="formAtualizar" class="btn btn-info" >Atualizar</button>
            </span>
    </modal>

    <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
            <p> {{$store.state.item.email}} </p>
    </modal>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>