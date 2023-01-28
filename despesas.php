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
          <li><a href="consumo.php">Consumo</a></li>
          <li class='acessado'><a href="despesas.php">Despesas</a></li>
        </ul>
      </nav>
    </header>

   <main>    
   <h2 class='tituloTopico'>Despesas</h2>
      <table>
            <thead>
                    <th>Data</th>
                    <th>Despesa</th>
                    <th>Quant</th>
                    <th>Valor</th>
            </thead>
            
            <tbody>
            <?php 
                include_once 'infoBd.php';
                // Executa a query desejada 
                $query = "SELECT * FROM despesas"; 
            
                $result_query = mysqli_query( $bancoDeDados, $query ) ;

                // Exibe os registros na tela 
                $totalDespesa = 0.0;
                while ($row = mysqli_fetch_array( $result_query )) { 
                    echo "<tr>";
                    
                    echo "<td>" . date_format(date_create($row["data_despesa"]), "d/m/Y") . "</td>"; 
                    echo "<td>" . $row["despesa"] . "</td>";
                    echo "<td>" . $row["qtd"] . "</td>";
                    echo "<td> R$ " . number_format($row["valor"],2) . "</td>";
                    $totalDespesa += $row["valor"];
                    echo "</tr>";
                }
            $mostraTotalDespesa =  number_format($totalDespesa, 2);
            echo "</tbody>";

            echo "<tfoot>
                <td class='footReceita' colspan = '3'>Total</td>
                <td class='footReceita'>R$ $mostraTotalDespesa</td>
            </tfoot>";
            ?>
        </table>      
   </main>   
</body>
</html>
