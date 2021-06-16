@extends('layouts.app')

@section('content')
    <pagina tamanho="12" >
        <painel titulo="Artigos">
            <div class="row">

                <p>
                    
                    <form action="{{route('site')}}" class="form-inline text-center" method="get">
                        <input type="search" name="busca" id="" class="form-control" placeholder="Buscar" value="{{isset($busca) ? $busca : "" }}" >
                        <button class="btn btn-info">Buscar</button>
                    </form>

                </p>

                @foreach ($lista as $key => $value)
                    <artigocard 
                    imagem="https://fortissima.com.br/wp-content/uploads/2016/03/bloco-de-anotacoes-doutissima-istock.jpg"
                    titulo="{{str_limit($value->titulo,25,'...')}}"
                    descricao="{{str_limit($value->descricao,40,'...')}}"
                    link="{{route('artigo',[$value->id, str_slug($value->titulo)])}}"
                    data="{{$value->data}} "
                    autor="{{$value->autor}}"
                    sm="6"
                    md="4"
                    ></artigocard> 
                @endforeach
               
            </div>    

            <div align="center">
                {{$lista}}
            </div>
        </painel>
    </pagina>
@endsection