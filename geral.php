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
            <li class='acessado'><a href="geral.php">Geral</a></li>
            <li><a href="vendas.php">Vendas</a></li>
            <li><a href="consumo.php">Consumo</a></li>
            <li><a href="despesas.php">Despesas</a></li>
        </ul>
      </nav>
    </header>
   

   <main>
        <h2 class='tituloTopico'>Gráfico geral</h2>
       <div id="barchart_values"></div>

        <h2 class='tituloTopico'>Totais</h2>
        <table>          
            <tbody>
                <tr>
                    <td style=' background-color: lightgreen'> Receita </td> 
                    <?php 
                    include_once 'infoBd.php';
                     // Executa a query desejada 
                    $query = "SELECT valor FROM receita"; 
                    $result_query = mysqli_query( $bancoDeDados, $query ) ;
                    // Exibe os registros na tela 
                    $totalReceita = 0.0;
                    while ($row = mysqli_fetch_array( $result_query )) { 
                        $totalReceita += $row["valor"];
                    }
                    $mostraTotalReceita =  number_format($totalReceita, 2);
                    // tag HTML
                    echo "<td style=' background-color:lightgreen'>R$ $mostraTotalReceita </td>";
                    ?> 
                </tr>

                <tr>
                    <td style= background-color:orange> Despesa </td>                    
                    <?php 
                        // Executa a query desejada 
                        $queryDespesa = "SELECT valor FROM despesas"; 
                        $result_query_despesa = mysqli_query( $bancoDeDados, $queryDespesa ) ;
                        // Exibe os registros na tela 
                        $totalDespesa= 0.0;
                        while ($row = mysqli_fetch_array( $result_query_despesa )) { 
                            $totalDespesa += $row["valor"];
                        }
                        $mostraTotalDespesa =  number_format($totalDespesa, 2);
                        echo "<td style=' background-color:orange'>R$ $mostraTotalDespesa </td>";
                    ?> 
                </tr>
                </tbody>
                <?php
                    $totalBalancete = ((float)$totalReceita - (float)$totalDespesa);
                    ($totalBalancete > 0) ? $cor = 'lightblue' : $cor = 'lightcoral';
                    echo "<tfoot>
                        <td style=' background-color:$cor'>Total</td>
                        
                        <td style=' background-color:$cor;'>R$ " . number_format($totalBalancete,2) . "</td>
                    </tfoot>"
                ?>
        </table>
   </main> 
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["", "Valor", { role: "style" } ],
        ["Receita", <?=$mostraTotalReceita?>, "lightgreen"],
        ["Despesa", <?=$mostraTotalDespesa?>, "orange"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        width: 700,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
      }
    </script>
</body>
</html>
