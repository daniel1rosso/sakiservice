    <div class="page-wrapper">
    <!-- HEADER MOVILE -->
        <header class="header-mobile d-block d-lg-none" style="background: linear-gradient(31deg, rgba(243,251,4,1) 22%, rgba(251,6,154,1) 78%);">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo">
                            <img src="<?= $url ?>img/icon/logo.png" alt="CoolAdmin"/>
                        </a>
                        <button class="hamburger hamburger--slider" id="hamburger" name="hamburger" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled listaDespegable">
                        <li class="has-sub">
                            <a href="<?= $url ?>pedidos/listar_pedidos" style="text-decoration-line: none;">
                            <i class="fas fa-shipping-fast"></i>Pedidos</a>
                        </li>

                        <?php if ($user['idNivel'] == 1){  ?>
                            <li>
                                <a href="<?= $url ?>usuarios/listar_usuarios" style="text-decoration-line: none;">
                                <i class="far fa-user"></i>Usuarios</a>
                            </li>
                        <?php } ?>

                        <li class="has-sub">
                            <a href="<?= $url ?>admin/logout" style="color:#F2F100; padding-top:1%; text-decoration-line: none;" >
                            <i class="fas fa-sign-out-alt" style="color:gray;"></i>Salir</a>

                        </li>

                    </ul>
                </div>
            </nav>

        </header>
        <!-- END HEADER MOBILE-->

        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background: linear-gradient(31deg, rgba(243,251,4,1) 22%, rgba(251,6,154,1) 78%);">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!-- NOTIFICACION DE LA DERECHA
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                    ACA TERMINA LA NOTIFICACION DE LA DERECHA-->
                                    <a class="navbar-brand"  href="<?= $url ?>admin/logout" style="color:yellow; padding-top:1%">Salir</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </header>
        </div>
