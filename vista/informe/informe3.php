<?php
require_once '../../modelo/db.php';
require_once '../plantillas/header.php';
$conexion = new DB();

$fecha1 = $_POST['Fecha5'];
$fecha2 = $_POST['Fecha6'];
$_SESSION['Mensaje']= '';
$info = 1;        
if ($fecha2 < $fecha1) {
   $_SESSION['Mensaje'] = 'menor';
   $info = 6;
   if(!empty($_SESSION['Mensaje'])){
   ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p class="m-none text-semibold h6">
            La fecha "hasta" no puede ser menor que la fecha "desde".
         </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
   }
                        
}
if (($fecha2 == null) || ($fecha1 == null)) {
    $_SESSION['Mensaje'] = 'null';
    $info = 7;
     if(!empty($_SESSION['Mensaje'])){
  ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p class="m-none text-semibold h6">
            Los valores de las fechas no pueden estar vacios.
         </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
   }
}

$fechaInicial = date("d/m/Y",strtotime($fecha1));
$fechaFinal = date("d/m/Y",strtotime($fecha2));

if($info == 1 && isset($_POST["btnBarra3"])){
    $mensaje='';
    $sql = "SELECT medioPago, COUNT(*) FROM venta WHERE fechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY medioPago"; 
    $consulta = $conexion->conectar()->prepare($sql);
    $consulta ->execute();  
    while($row=$consulta->fetch(PDO::FETCH_ASSOC)){ 
            $height1 = $row['medioPago'];
            $height =  trim(addslashes($height1));
            $height  = preg_replace('/\W/', '', $height); 
            $weight = $row['COUNT(*)'];
            $weight  = preg_replace('/\D/', '', $weight);
            $myurl[] = "[' ".$height."',".$weight."]";
        } 

?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Antic" rel="stylesheet">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Diagrama de Barras</title>
    <link rel="stylesheet" href="../../css/estilo_informes.css">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            /* Define the chart to be drawn.*/
            var data = google.visualization.arrayToDataTable([
             ['Medio de pago', 'Cantidad de ventas. <?php echo "Desde $fechaInicial hasta $fechaFinal"; ?>' ], 
                <?php echo implode(",", $myurl); ?>
            ]);
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }
                       ]);
          
           var options = {
                title: 'Cantidad de ventas de acuerdo al medio de pago',
                colors: ['#101b87'],
                titleTextStyle: {
                   color: 'black',    // any HTML string color ('red', '#cc00cc')
                   fontName: 'Times New Roman', // i.e. 'Times New Roman'
                   fontSize: 22, // 12, 18 whatever you want (don't specify px)
                   bold: true,    // true or false
                   italic: false   // true of false
                }, 
                hAxis : {  
                    title: 'Total de ventas',
                    textStyle : {
                         fontSize: 14, 
                    }
                },
                vAxis : {  
                    title: 'Medios de pago'         
                },
                chartArea: {
                    bottom: 24,
                    left: 236,
                    right: 325,
                    top: 48,
                    width: '60%',
                    height: '80%'
                },
                legend: {position: 'top'},
                height: 600,
                width: 1400,
                bar: {groupWidth: "65%"}       
            };/*
            /* Instantiate and draw the chart.*/
            var my_div = document.getElementById('my_div');
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(view, options);
            var btnSave = document.getElementById('save-pdf');

  google.visualization.events.addListener(chart, 'ready', function () {
    document.getElementById('my_div').innerHTML = '<img src="' + chart.getImageURI() + '">';
    document.getElementById('my_div').outerHTML = '<a href="' + chart.getImageURI() + '" target="_blank"><input id= "save-pdf" type="button" value="Mostrar en PNG" /></a>';
    btnSave.disabled = false;
  });

  btnSave.addEventListener('click', function () {
    var doc = new jsPDF(); 
    doc.addImage(chart.getImageURI(), 0, 0, 225, 150);
    doc.save('DiagramaBarras.pdf');
  }, false);
  chart.draw(view, options);
  
}
<?php } 
 else if($info == 1 && isset($_POST["btnCircular3"])){
    $mensaje='';
    $sql = "SELECT medioPago, COUNT(*) FROM venta WHERE fechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY medioPago"; 
    $consulta = $conexion->conectar()->prepare($sql);
    $consulta ->execute();  
    while($row=$consulta->fetch(PDO::FETCH_ASSOC)){
            $height1 = $row['medioPago'];
            $height =  trim(addslashes($height1));
            $height  = preg_replace('/\W/', '', $height);
            $weight = $row['COUNT(*)'];
            $weight  = preg_replace('/\D/', '', $weight);
            $myurl[] = "[' ".$height."',".$weight."]";
     } 
?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Antic" rel="stylesheet">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Gráfico Circular</title>
   <link rel="stylesheet" href="../../css/estilo_informes.css">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            /* Define the chart to be drawn.*/
            var data = google.visualization.arrayToDataTable([
             ['Medio de pago', 'Cantidad de ventas'], 
                <?php echo implode(",", $myurl); ?>
            ]);
          
            /* Instantiate and draw the chart.*/
            var total = 0;
            for (var i = 0; i < data.getNumberOfRows(); i++) {
                  total = total + data.getValue(i, 1);    
            }

            for (var i = 0; i < data.getNumberOfRows(); i++) {
                 var label = data.getValue(i, 0);
                 var val = data.getValue(i, 1) ;
                var percentual = ((val / total) * 100).toFixed(1); 
                data.setFormattedValue(i, 0, label  + '. Total: '+val +' ('+ percentual + '%)');    
            }

           var options = {
                title: 'Cantidad de ventas de acuerdo al medio de pago ',
                legend: { position: 'right', textStyle: { color: 'black', fontSize: 14, italic: true } },
                is3D: true,
                titleTextStyle: {
                   color: 'black',    // any HTML string color ('red', '#cc00cc')
                   fontName: 'Times New Roman', // i.e. 'Times New Roman'
                   fontSize: 30, // 12, 18 whatever you want (don't specify px)
                   bold: true,    // true or false
                   italic: false   // true of false
                }             
            };
            
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var btnSave = document.getElementById('save-pdf');

  google.visualization.events.addListener(chart, 'ready', function () {
    document.getElementById('my_div').innerHTML = '<img src="' + chart.getImageURI() + '">';
    document.getElementById('my_div').outerHTML = '<a href="' + chart.getImageURI() + '" target="_blank"><input id= "save-pdf" type="button" value="Mostrar en PNG" /></a>';
    btnSave.disabled = false;
  });

  btnSave.addEventListener('click', function () {
    var doc = new jsPDF(); 
    doc.addImage(chart.getImageURI(), 0, 0, 225, 175);
    doc.save('GraficoCircular.pdf');
  }, false);

  chart.draw(data, {
    chartArea: {
      bottom: 24,
      left: 246,
      right: 325,
      top: 88,
      width: '100%',
      height: '100%'
    },
    legend: { position: 'right', textStyle: { color: 'black', fontSize: 14, italic: true } },
    is3D: true,
    height: 600,
    width: 1400,
    title: 'Cantidad de ventas de acuerdo al medio de pago <?php echo "desde $fechaInicial hasta $fechaFinal"; ?>',
    titleTextStyle: {
                   color: 'black',    // any HTML string color ('red', '#cc00cc')
                   fontName: 'Times New Roman', // i.e. 'Times New Roman'
                   fontSize: 25, // 12, 18 whatever you want (don't specify px)
                   bold: true,    // true or false
                   italic: false   // true of false
                } 
  });
}
<?php } else if($info == 1 && isset($_POST["btnLineal3"])){
    $mensaje='';
    $sql = "SELECT medioPago, COUNT(*) FROM venta WHERE fechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY medioPago"; 
    $consulta = $conexion->conectar()->prepare($sql);
    $consulta ->execute();  
    while($row=$consulta->fetch(PDO::FETCH_ASSOC)){
            $height1 = $row['medioPago'];
            $height =  trim(addslashes($height1));
            $height  = preg_replace('/\W/', '', $height);
            $weight = $row['COUNT(*)'];
            $weight  = preg_replace('/\D/', '', $weight);
            $myurl[] = "[' ".$height."',".$weight."]";
        }  ?>
    <!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Antic" rel="stylesheet">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Gráfico Lineal</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link rel="stylesheet" href="../../css/estilo_informes.css">
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart", "line"]});
        google.charts.setOnLoadCallback(drawBackgroundColor);
        function drawBackgroundColor() {
            /* Define the chart to be drawn.*/
            var data = google.visualization.arrayToDataTable([//arrayTo
             ['Usuarios', 'Cantidad de ventas. <?php echo "Desde $fechaInicial hasta $fechaFinal"; ?>'], 
                <?php echo implode(",", $myurl); ?>
            ]);
        
           var options = {
                title: 'Cantidad de ventas de acuerdo al medio de pago',
                titleTextStyle: {
                   color: 'black',    // any HTML string color ('red', '#cc00cc')
                   fontName: 'Times New Roman', // i.e. 'Times New Roman'
                   fontSize: 30, // 12, 18 whatever you want (don't specify px)
                   bold: true,    // true or false
                   italic: false   // true of false
                },
                fontSize: 14,
                height: 600,
                width: 1600,
                legend: { position: 'top', textStyle: { color: 'black', fontSize: 14, italic: true } },
                pointSize: 3,
                 hAxis: {
                    title: 'Medios de pago',
                    titleTextStyle: {
                        bold: true,
                      }  
                    }, 
                vAxis : { 
                     title: 'Ventas',
                     titleTextStyle: {
                        bold: true,
                      }, 
                      minValue: 0, 
                  },
                  colors: ['#AB0D06', '#007329'],
                  trendlines: {
                    0: {type: 'exponential', color: '#333', opacity: 1},
                    1: {type: 'linear', color: '#111', opacity: .3}
                  }
                };
            /* Instantiate and draw the chart.*/
          var chart = new google.visualization.LineChart(document.getElementById('chart_div')); 
          var btnSave = document.getElementById('save-pdf');
          google.visualization.events.addListener(chart, 'ready', function () {
             document.getElementById('my_div').innerHTML = '<img src="' + chart.getImageURI() + '">';
            document.getElementById('my_div').outerHTML = '<a href="' + chart.getImageURI() + '" target="_blank"><input id= "save-pdf" type="button" value="Mostrar en PNG" /></a>';
            btnSave.disabled = false;
         });

  btnSave.addEventListener('click', function () {
    var doc = new jsPDF(); 
    doc.addImage(chart.getImageURI(), 0, 0, 225, 150);
    doc.save('GraficoLineal.pdf');
  }, false);
  chart.draw(data, options);

};
<?php }//Fin  ?> 
     </script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
  <link rel="stylesheet" href="../../css/estilo_informes.css">
    </head>
<body>
    
    <div id="chart_div" style="width: 1300px; height: 650px; font-size: 3px; height: 200em;">
    </div>
    <input id="save-pdf" type="button" value="Guardar PDF" disabled />
    
     <div id="my_div" >
    </div>
</body>
</html>



