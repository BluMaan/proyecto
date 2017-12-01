<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/menu">       
                <span>
                    <img src="<?= base_url('assets/imagenes/logo_menu.png') ?>">
                </span>
                <?= NOMBRE_CORTO_SISTEMA ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" >
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/seguridad/roles">Roles de Usuario</a></li>
                        <li><a href="<?= site_url() ?>/seguridad/usuarios">Usuarios</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= site_url() ?>/reportes/reporte_usuarios" target="popup" onClick="window.open(this.href, this.target, 'width=800,height=600');
                                    return false;">Reporte Usuarios</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Procesos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/procesos/cargos">Cargos</a></li>
                        <li><a href="<?= site_url() ?>/procesos/personas">Personas</a></li>
                        
                        <!--<li><a href="<?= site_url() ?>/procesos/formulario018">Formulario 18</a></li>-->
                        <!--
                        <li><a href="<?= site_url() ?>/ejemplo/maestro_detalle">Maestro Detalle</a></li>
                        -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pagos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/procesos/pagos">Registrar</a></li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Asistencia<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/procesos/asistencia">Registrar</a></li>
                        
                    </ul>
                </li>
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= site_url() ?>/reportes/reportepdf" target="popup" onClick="window.open(this.href, this.target, 'width=800,height=600');
                                    return false;">Reporte 1</a>
                        </li>

                    </ul>
                </li>
                -->

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-text">
                        <?= $this->session->userdata('datos') ?>
                    </p></li>
                <li><a href="<?php echo site_url(); ?>/autentificacion/salir">
                        <span class="glyphicon glyphicon-off"></span>
                        <b>SALIR</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

