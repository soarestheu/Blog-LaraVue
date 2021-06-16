@extends('layouts.app')

@section('content')
    <pagina tamanho="12" >

        @if ($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span> </button>
                @foreach ($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li> 
                @endforeach
            </div>
        @endif

        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista=" {{ $listaMigalhas }} " ></migalhas>

            
            <tabela-lista 
                v-bind:titulos="['#','Título','Descrição', 'Autor','data']"
                v-bind:itens="{{json_encode($listaArtigos)}}" 
                ordem="desc" ordemCol="1"   
                criar="#criar"
                detalhe="/admin/artigos/"
                editar="/admin/artigos/"
                deletar="/admin/artigos/"
                token="{{csrf_token()}}" 
                modal="sim"
            ></tabela-lista>
            <div align="center">
                {{$listaArtigos->links()}}
            </div>
        </painel>
    </pagina>


    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}" >
            
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" value="{{old('titulo')}}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição" value="{{old('descricao')}}" >
            </div>
            
            <div class="form-group">
                <label for="addConteudo">Conteúdo</label><br/>
                <textarea name="conteudo" id="addConteudo" class="form-control" value="{{old('conteudo')}}" ></textarea>
                
                {{-- <vue-ckeditor 
                    id="addConteudo"
                    name="conteudo"
                    value="{{old('conteudo')}}" 
                    v-bind:config="{
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
                        ],
                        height: 300
                      }" /> --}}
            </div>
            <div class="form-group">
                <label for="descricao">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="{{old('data')}}">
            </div>
        </formulario>

        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar" titulo="Editar">
            <formulario id="formAtualizar" css="" v-bind:action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{csrf_token()}}" >
                
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
            <p> @{{$store.state.item.descricao}} </p>
            <p> @{{$store.state.item.conteudo}} </p>
    </modal>
@endsection

