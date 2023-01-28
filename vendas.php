<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Relatório - Chopp Autosserviço</title>
   <link rel="stylesheet" href="style_aplication.css">
</head>
<body>
    <header>
        <h1 class='titulo'>Balancete</h1>

        <nav>
        <ul type="none" class="itens-menu">
          <li><a href="geral.php">Geral</a></li>
          <li class='acessado'><a href="vendas.php">Vendas</a></li>
          <li><a href="consumo.php">Consumo</a></li>
          <li><a href="despesas.php">Despesas</a></li>
        </ul>
      </nav>
    </header>
   

   <main>
   <h2 class='tituloTopico'>Vendas por cliente</h2>
      <table>   
            <thead>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Valor</th>
            </thead>
            
            <tbody>
            <?php 
                include_once 'infoBd.php';
                // Executa a query desejada 
                $query = "SELECT clientes.id, clientes.nome, sum(valor) as comprado
                from receita join clientes 
                on receita.cod_cliente = clientes.cod
                group by cod_cliente
                order by clientes.nome"; 
            
                $result_query = mysqli_query( $bancoDeDados, $query ) ;

                // Exibe os registros na tela 
                $totalReceita = 0.0;
                while ($row = mysqli_fetch_array( $result_query )) { 
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>"; 
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td> R$ " . $row["comprado"] . "</td>";
                    $totalReceita += $row["comprado"];
                    echo "</tr>";
                }
            $mostraTotalReceita =  number_format($totalReceita, 2);
            echo "</tbody>";

            echo "<tfoot>
                <td class='footReceita' colspan = '2'>Total</td>
                <td class='footReceita'>R$ $mostraTotalReceita</td>
            </tfoot>";
            ?>
        </table>
        <hr>
      <h2 class='tituloTopico'>Registros de vendas</h2>
      <table>   
            <thead>
                    <th>Data</th>
                    <th>Cartão</th>
                    <th>Cliente</th>
                    <th>Valor</th>
            </thead>
            
            <tbody>
            <?php 
                include_once 'infoBd.php';
                // Executa a query desejada 
                $query = "SELECT receita.data_credito, receita.valor, clientes.id, clientes.nome 
                FROM receita JOIN clientes
                on receita.cod_cliente = clientes.cod "; 
            
                $result_query = mysqli_query( $bancoDeDados, $query ) ;

                // Exibe os registros na tela 
                $totalReceita = 0.0;
                while ($row = mysqli_fetch_array( $result_query )) { 
                    echo "<tr>";
                    echo "<td>". date_format(date_create($row["data_credito"]), "d/m/y - H:i:s") . "</td>";
                    echo "<td>" . $row["id"] . "</td>"; 
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td> R$ " . $row["valor"] . "</td>";
                    $totalReceita += $row["valor"];
                    echo "</tr>";
                }
            ?>
        </table>
   </main>
</body>
</html>
