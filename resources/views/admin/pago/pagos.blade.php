<html>
<head>

<body>
  <?php
  
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
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Capacitacion</th>
        <th>Tipo Beca</th>
        <th>Monto</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
       @foreach($pagos as $porcentaje)
         
                <tr>
                    <td>{{ $porcentaje->first_name }}</td>
                    <td>{{ $porcentaje->last_name }}</td>
                    <td>{{ $porcentaje->nombre_capacitacion }}</td>
                    <td>{{ $porcentaje->tipo_beca}}</td>
                    <td>{{ $porcentaje->monto}}</td>
                    <td>{{ $porcentaje->estado}}</td>
                  
                </tr>
            @endforeach
    </tbody>
  </table>
  </div>
</body>
</html>
