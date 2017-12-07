
<aside class="sidebar">
  <div id="leftside-navigation" class="nano">
    <ul class="nano-content">
      <li <?php if($page == "Mi perfil"){ echo 'class="active"';} ?>>
        <a href="../proceso/index.php"><i class="material-icons">dashboard</i><span>Mi perfil</span></a>
      </li>
      <li class="sub-menu <?php if($page == "Vacantes"){ echo 'active';} ?>">
        <a href="javascript:void(0);"><i class="material-icons">account_circle</i><span>Vacantes</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>

          <li <?php if($page == "Usuarios" && !isset($_GET['Vacantes'])){ echo 'class="active"';} ?>><a href="vacantes.php">Lista de vacantes</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="material-icons">record_voice_over</i><span>Mis solicitudes</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="solicitudes.php">Lista de solicitudes</a>
          </li>
        </ul>
      </li>
      
      <li class="sub-menu">
        <a href="typography.html"><i class="material-icons">exit_to_app</i><span>Cerrar sesión</span></a>
      </li>

    </ul>
  </div>
</aside>
