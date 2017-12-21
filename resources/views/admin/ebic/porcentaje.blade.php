<html>
<head>

<body>
  <?php
   // dd($porcentaje);
  ?>
  <header>
  <link rel="stylesheet" href="estilos/pdfStyle.css">
    <h1>Consultora Alpha</h1>
    <p class="izq">
              <img src="images/logo.jpeg" style="width: 100px; height: 80px; float: right;">
         </p>
    <h2>Capacitaciones</h2>
  </header>
  <footer>
   
         <p class="izq">
              Consultora Alpha
         </p>
          <p class="page">
             Página
          </p>
  
  </footer>
  <div id="content">
   <table id="tabla" style="width:100% ">
    <thead>
      <tr>
        <th>Institucion</th>
        <th>Capacitacion</th>
        <th>Porcentaje</th>
      </tr>
    </thead>
    <tbody>
       @foreach($porcentaje as $porcentaje)
         <?php
            
            $porcentajes= $porcentaje->sumaEmpleados*100;
            $porcentajes=$porcentajes/$sumaempleados[0]->suma;
            
          ?>
                <tr>
                    <td>{{ $porcentaje->nombre_capacitacion }}</td>
                    <td>{{ $porcentaje->nombre_institucion }}</td>
                    <td>{{ $porcentajes}}%</td>
                  
                </tr>
            @endforeach
    </tbody>
  </table>
  </div>
</body>
</html>
