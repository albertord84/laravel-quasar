<html>
    <head>
        <style>
            .mail-header{
                background-color: #f57c00;
                min-height: 100px;
                vertical-align: middle;
            }
            .mail-body{
                min-height: 300px;
            }
            .mail-footer{
                background-color: #f57c00;
                min-height: 100px;
                vertical-align: middle;
            }
            .text-center{
                text-align: center;
            }
            .logo{
                font-size: 4rem;
                color: white;
            }
            .content{
                font-size: 1rem;
                margin: 2rem;
                margin-left: 30px;
                margin-right: 30px;
                text-align: justify;
            }
            .credentials{
                margin-left: 2rem;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="mail-header text-center">
                <h1 class="logo">Physiback</h1>
            </div>
            <div class="mail-body">
                <br>
                <h2 class="text-center">Cadastro satisfatório</h2>
                <p class="content">
                    Prezado {{$User->username}},

                    <br><br>
                    O casatro da sua conta de Administrador na empresa Physiback foi criado com sucesso.

                    <br><br>
                    As suas credenciais para acesso ao nosso <a href="">sistema</a> são:

                    <br><br>
                    <b class="credentials">Usuário:</b> <span style="color:black">{{$User->email}}</span><br>
                    <b class="credentials">Senha:</b> {{$User->password}}

                    <br><br>
                    Muito obrigado por usar nosso serviço.<br>
                    Atte. Physiback.
                </p>

            </div>
            <div class="mail-footer text-center">
                <br>
                <h4>Physiback - {{date("Y")}} - Todos os direitos reservados</h4>
            </div>
        </div>
    </body>
</html>
