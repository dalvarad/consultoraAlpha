
<html>
<head>

<body>
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
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Capacitación</th>
        <th>Beca</th>
        <th>Institución</th>
        <th>Pago</th>
      </tr>
    </thead>
    <tbody>
       @foreach($ebic as $ebic)
                <tr>
                    <td>{{ $ebic->rut }}</td>
                    <td>{{ $ebic->first_name }}</td>
                    <td>{{ $ebic->last_name }}</td>
                    <td>{{ $ebic->nombre_capacitacion }}</td>
                    <td>{{ $ebic->porcentaje }}</td>
                    <td>{{ $ebic->nombre_institucion }}</td>
                    <td>{{ $ebic->estado }}</td>
                </tr>
            @endforeach
    </tbody>
  </table>
  </div>
</body>
</html>