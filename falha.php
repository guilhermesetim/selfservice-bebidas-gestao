<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Relatório - Chopp Autosserviço</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 class='titulo'>Chopp Autosserviço</h1>
    </header>
   

   <main class="conteudo">
       
        <h2 class="titleLogin">Login</h2>
       
        
    
        <div class="divTabela">
            <form class="formularioLogin" action="conexao.php" method="post">
                <p>
                    <label for="usuario">Usuário</label>
                    <input type="text" name="login" id="loginId" placeholder="admin">
                </p>
                <p>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senhaId" placeholder="senha">
                </p>

                <p>
                    <input id="submit" type="submit" value="Entrar">
                </p>
                
                <p>Falha ao logar<br>login ou senha inválidos</p>
                
            </form>
        </div>
       
        

      
   </main>

</body>
</html>
