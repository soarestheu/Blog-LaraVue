@extends('layouts.app')

@section('content')
    <pagina tamanho="10" >
        <painel titulo="Dashboard">
            <migalhas v-bind:lista=" {{ $listaMigalhas }} " ></migalhas>

            <div class="row">
                @can('autor')
                    <div class="col-md-4">
                        <caixa qtd="{{$countArtigo}} " titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="ion ion-stats-bars" ></caixa>
                    </div>
                @endcan
                
                @can('eAdmin')
                    <div class="col-md-4">
                        <caixa qtd="{{$countUser}}" titulo="Usuários" url="{{ route('usuarios.index')}}" cor="blue" icone="ion ion-person-stalker" ></caixa>

                    </div>

                    <div class="col-md-4">
                        <caixa qtd="{{$countAutores}}" titulo="Autores" url="{{ route('autores.index')}}" cor="red" icone="ion ion-person" ></caixa>
                    </div>

                    <div class="col-md-4">
                        <caixa qtd="{{$countAdmin}}" titulo="Admin" url="{{ route('adm.index')}}" cor="green" icone="ion ion-person" ></caixa>
                    </div>

                @endcan

                
            </div>
            
        </painel>
    </pagina>
@endsection
