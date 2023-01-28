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
          <li><a href="vendas.php">Vendas</a></li>
          <li class='acessado'><a href="consumo.php">Consumo</a></li>
          <li><a href="despesas.php">Despesas</a></li>
        </ul>
      </nav>
    </header>

   <main> 
   <h2 class='tituloTopico'>Consumo por cliente</h2>
      <table>
            <thead>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Qtd Canecas</th>
            </thead>
            
            <tbody>
            <?php 
                include_once 'infoBd.php';
                // Executa a query desejada
                $query = "SELECT clientes.id, clientes.nome, count(consumo.cod) as qtd
                FROM consumo JOIN clientes
                on consumo.cod_cliente = clientes.cod
                group by clientes.cod
                order by clientes.nome "; 
            
                $result_query = mysqli_query( $bancoDeDados, $query ) ;
                $totalCanecas = 0.0;
                // Exibe os registros na tela 
                while ($row = mysqli_fetch_array( $result_query )) { 
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>"; 
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["qtd"] . "</td>";
                    $totalCanecas += $row["qtd"];
                    echo "</tr>";
                }
            echo "</tbody>";
            echo "<tfoot>
                <td class='footReceita' colspan = '2'>Total</td>
                <td class='footReceita'>$totalCanecas</td>
            </tfoot>";
            
            ?>
        </table>    


      <h2 class='tituloTopico'>Histórico de consumo</h2>
      <table>
            <thead>
                    <th>Data</th>
                    <th>Cartão</th>
                    <th>Cliente</th>
            </thead>
            
            <tbody>
            <?php 
                include_once 'infoBd.php';
                // Executa a query desejada
                $query = "SELECT consumo.cod_cliente, consumo.data_consumo, clientes.id, clientes.nome 
                FROM consumo JOIN clientes
                on consumo.cod_cliente = clientes.cod 
                order by consumo.data_consumo"; 
            
                $result_query = mysqli_query( $bancoDeDados, $query ) ;

                // Exibe os registros na tela 
                while ($row = mysqli_fetch_array( $result_query )) { 
                    echo "<tr>";
                    echo "<td>" . date_format(date_create($row['data_consumo']), 'd/m/y - H:i:s') . "</td>"; 
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "</tr>";
                }
            echo "</tbody>";

            
            ?>
        </table>      
   </main>
</body>
</html>
