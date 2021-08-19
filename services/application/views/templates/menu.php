<section>
  <!--MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" style="background-color: #f3fb04;">
                <a href="#" style="width: 70%; margin: auto;">
                    <img src="<?= $url ?>img/icon/logo.png" alt="Cool Admin"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <img alt="" src="<?= $url . 'img/main-team-member-img-3-100x100.jpg' ?>" style="border-radius: 100%; width: 50%; display: block; margin: auto;border-bottom-style: groove;">
                            <span class="" style="text-transform:uppercase; margin: 4% 0%; text-align: center; display: block; padding-top: 5%;" href="#"><?= $user['apellido'] . ', ' . $user['nombreCompleto'] ?></span>
                            <div style="height: 1px; width: 100%; background-color: #fb069a;"></div>
                        </li>
                        <li>
                            <a href="<?= $url ?>pedidos/listar_pedidos"  style="text-decoration-line: none;">
                            <i class="fas fa-shipping-fast"></i>Pedidos</a>
                        </li>

                        <?php if ($user['idNivel'] == 1){  ?>
                            <li>
                                <a href="<?= $url ?>usuarios/listar_usuarios" style="text-decoration-line: none;">
                                <i class="far fa-user"></i>Usuarios</a>
                            </li>

                        <?php } ?>

                    </ul>
                </nav>
            
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
</section>
