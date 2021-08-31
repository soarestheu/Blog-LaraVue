<h1 align='center'>Blog - LaraVue</h1>

<p>Projeto de blog feito com <a href="https://laravel.com/docs/5.5">Laravel 5.5</a> e <a href="https://br.vuejs.org/v2/guide/index.html">VueJS</a></p>

<a href="https://github.com/soarestheu/Blog-LaraVue/issues"><img alt="GitHub issues" src="https://img.shields.io/github/issues/soarestheu/Blog-LaraVue"></a>
<a href="https://github.com/soarestheu/Blog-LaraVue/network"><img alt="GitHub forks" src="https://img.shields.io/github/forks/soarestheu/Blog-LaraVue"></a>


<h3>Alterações necessárias para rodar o projeto</h3>
<p>Alterar dentro do .env os seguintes campos:</p>
<!--ts-->
        *[DB_CONNECTION] 
        *[DB_HOST]
        *[DB_DATABASE]
        *[DB_USERNAME]
        *[DB_PASSWORD]
<!--te-->


<h4>Rodando o projeto</h4>

<p><h6>Criando banco de dados com as migrations:</h6>php artisan migrate</p>
<p><h6>Front-end:</h6>npm run watch</p>
<p><h6>Back-end:</h6>php artisan serve</p>
