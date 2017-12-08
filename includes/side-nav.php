
<aside class="sidebar">
  <div id="leftside-navigation" class="nano">
    <ul class="nano-content">
      <li <?php if($page == "Dashboard"){ echo 'class="active"';} ?>>
        <a href="../inicio/index.php"><i class="material-icons">dashboard</i><span>Inicio</span></a>
      </li>
      <li class="sub-menu <?php if($page == "Usuarios"){ echo 'active';} ?>">
        <a href="javascript:void(0);"><i class="material-icons">account_circle</i><span>Usuarios</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>

          <li><a href="../usuarios/index.php">Lista de usuarios</a>
          </li>
          <li><a href="../usuarios/index.php?newUser=1">Agregar usuario</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu <?php if($page == "Vacantes"){ echo 'active';} ?>">
        <a href="javascript:void(0);"><i class="material-icons">record_voice_over</i><span>Vacantes</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="../vacantes/index.php">Lista de vacantes</a>
          </li>

          <li><a href="../vacantes/index.php?newVacante=1">Agregar vacante</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu <?php if($page == "Solicitudes para vacantes" || $page == "Solicitud"){ echo 'active';} ?>">
        <a href="javascript:void(0);"><i class="material-icons">assignment</i><span>Solicitudes vacantes</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="../solicitudes/solicitudes-vacantes.php">Lista de solicitudes para vacantes</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="material-icons" style="font-size: 25px;">supervisor_account</i><span>Asesorías a clientes</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="mail-inbox.html">Lista de solicitudes de asesorías</a>
          </li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:void(0);"><i class="material-icons">message</i><span>Mensajes de contacto</span><i class="arrow fa fa-angle-right pull-right"></i></a>
        <ul>
          <li><a href="charts-chartjs.html">Lista de mensajes de contacto</a>
          </li>
        </ul>
      </li>
      
      <li class="sub-menu">
        <a href="typography.html"><i class="material-icons">settings</i><span>Configuración</span></a>
      </li>
      <li class="sub-menu">
        <a href="typography.html"><i class="material-icons">exit_to_app</i><span>Cerrar sesión</span></a>
      </li>

    </ul>
  </div>
</aside>
