<!doctype html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Álbum</title>
    <style>

        body { padding: 20px; }
        .navbar { margin-bottom: 20px; }
        :root { --jumbotron-padding-y: 10px; }
        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }
        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }
        .jumbotron p:last-child { margin-bottom: 0; }
        .jumbotron-heading { font-weight: 300; }
        .jumbotron .container { max-width: 40rem; }
        .btn-card { margin: 4px; }
        .btn { margin-right: 5px; }
        footer { padding-top: 3rem; padding-bottom: 3rem; }
        footer p { margin-bottom: .25rem; }

        .custom-file-input ~ .custom-file-label::after {
            content: "Buscar";
            background-color: rgb(255, 000, 000, 40%);
            color: white;
        }

        .navbar{
            background-color: rgb(255, 000, 000, 40%);
        }

        #topo{
            color: indianred;
        }

        .container-externo, .container-post{
            background-color: rgb(255, 100, 000, 5%);
        }

        .form-control{
            box-shadow: 0 0 3px rgb(255,100,0, 10%);
            border-color: transparent;
            border-radius: 10px;
        }

        .btn-custom-1{
            background-color: rgb(255, 000, 000, 40%);
            color: white;
        }

        .btn-custom-2{
            background-color: rgb(200, 50, 000, 50%);
            color: white;
        }

    </style>
</head>
<body>

<header>
    <div class="navbar navbar-dark shadow-sm" id="navbar">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Seu álbum de fotos</strong>
        </a>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center container-externo">
        <div class="container">
            <h1 class="jumbotron-heading head-custom">Novo Post</h1>
            <form method="POST" action="/" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-left">
                    <label for="email">Endereço de e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@dominio.com">
                </div>
                <div class="form-group text-left">
                    <label for="mensagem">Sua mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                    <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                </div>
                <p>
                    <button type="submit" class="btn btn-custom-1 my-2">Enviar</button>
                    <button type="reset" class="btn btn-custom-2 my-2">Cancelar</button>
                </p>
            </form>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm container-post">
                            <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{$post->arquivo}}">
                            <div class="card-body">
                                <p class="card-text">{{$post->email}}</p>
                                <p class="card-text">{{$post->mensagem}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="/{{$post->id}}">Download</a>
                                        <form method="post" action="/{{$post->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#navbar" id="topo">Voltar para o topo</a>
        </p>
        <p>©2021 seualbum.com</p>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
