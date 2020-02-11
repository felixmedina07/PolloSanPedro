
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="principal.php">Pollos San Pedro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto">
     <?php if($_SESSION['rol']=='A'):?>
      <li class="nav-item">
        <a class="nav-link" href="dia.php"><i class="fas fa-calendar-day"></i> Dia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="papelera.php"><i class="fab fa-product-hunt"></i> Papelera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuarios.php"><i class="fas fa-user"></i> Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="productos.php"><i class="fab fa-product-hunt"></i> Productos</a>
      </li>
     <?php endif; ?> 
      <li class="nav-item">
        <a class="nav-link" href="clientes.php"><i class="fas fa-users"></i> Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bn-casa.php"><i class="fas fa-university"></i> Bancos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bn-clientes.php"><i class="fas fa-university"></i> Bancos Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="despacho.php"><i class="fas fa-clipboard-list"></i> Despachos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cuentas.php"><i class="fas fa-search-dollar"></i> Cuentas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="color: red;" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-address-card bg-red"></i> Usuario <?php echo $_SESSION['nom_usu'];?>
        </a>
            <div class="dropdown-menu bg-danger"  aria-labelledby="navbarDropdownLink">
             <a class="dropdown-item h" href="backend/controllers/login/salir.php"><i class="fas fa-power-off"></i> Salir</a>
            </div>
      </li>
    </ul>
  </div>
  </div>
</nav>