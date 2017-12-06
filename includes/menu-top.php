<header class="menu-top z-depth-0">
    <div class="menu-top-left">
        <div class="logo">
            <img src="../assets/img/logo.png" alt="logo">
        </div>
        <div class="section">
            <h4><?php echo $page; ?></h4>
        </div>
    </div>

    <div class="user-info">
        <i class="material-icons menu-notifications">notifications</i>

        <span class="avatar-app" style="background: url(../assets/img/man.png);"></span>

        <div class="user-name">
            <span><?php echo $user->name; ?></span>
        </div>
        <!-- Dropdown Trigger -->
        <a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons">arrow_drop_down</i></a>

      <!-- Dropdown Structure -->
      <ul id='dropdown1' class='dropdown-content'>
        <?php if($GFUser->isProspect($user_id) === true){?>
        <li><a href="logout.php">Cerrar Sesión</a></li>
        <?php }else{?>
        <li><a href="../logout.php">Cerrar Sesión</a></li>
        <?php } ?>
      </ul>
    </div>
</header>