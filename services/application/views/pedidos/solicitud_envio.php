<div class="page-wrapper">
<div class="page-container">
          <!-- MAIN CONTENT-->
            <div class="main-content">

                <div class="section__content section__content--p30">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Solicitud de retiro de paqueteria</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="formSolicitudEnvio" name="formSolicitudEnvio">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Cliente</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static" id="nombreClienteEnvio_formSolicitudEnvio" name="nombreClienteEnvio_formSolicitudEnvio"></p>
                                                </div>
                                            </div>
                                            <!--Empresa que envia-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Empresa</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="empresa_formSolicitudEnvio" name="empresa_formSolicitudEnvio" placeholder="Nombre de la empresa solicitante" class="form-control">
                                                </div>
                                            </div>
                                            <!--Direccion de retiro-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Dirección de retiro</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="direccion_formSolicitudEnvio" name="direccion_formSolicitudEnvio" placeholder="Dirección en donde se retirará el paquete" class="form-control">
                                                </div>
                                            </div>
                                            <!--Telefono de contacto-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Telefono de contacto</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="telefono_formSolicitudEnvio" name="telefono_formSolicitudEnvio" placeholder="Número telefonico de contacto" class="form-control">
                                                </div>
                                            </div>
                                            <!--Fecha de retiro-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Fecha de retiro
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="fechaRetiro_formSolicitudEnvio" name="fechaRetiro_formSolicitudEnvio" placeholder="Fecha que se espera ser retirado" class="form-control">

                                                </div>
                                            </div>
                                            <!--Intervalo de hora de retiro-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Intervalo de hora de retiro
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9" style="display: flex;">
                                                    <div class="col-md-6"  style="display: inline-table; padding-left: 0px;padding-right: 15px" >
                                                        <input type="time" id="horaDesde1_formSolicitudEnvio" name="horaDesde1_formSolicitudEnvio" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="col-md-6" style="display: inline-table; padding-left: 0px; padding-right: 0px;">
                                                        <input type="time" id="horaHasta1_formSolicitudEnvio" name="horaHasta1_formSolicitudEnvio" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Horario de retiro-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class="form-control-label">Comuna de retiro</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="comuna_formSolicitudEnvio" id="comuna_formSolicitudEnvio" class="form-control">
                                                        <option value="0">Seleccione una comuna del listado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--Nombre del receptor-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nombre del receptor</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nombreReceptor_formSolicitudEnvio" name="nombreReceptor_formSolicitudEnvio" placeholder="Nombre de la persona que lo va a recibir" class="form-control">
                                                </div>
                                            </div>
                                            <!--Dirección de despacho-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Dirección de despacho</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="direccionDespacho_formSolicitudEnvio" name="direccionDespacho_formSolicitudEnvio" placeholder="Dirección en donde será entregado el paquete" class="form-control">
                                                </div>
                                            </div>
                                            <!--Telefono del receptor-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Teléfono del receptor</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="telefonoDespacho_formSolicitudEnvio" name="telefonoDespacho_formSolicitudEnvio" placeholder="Número telefonico del encargado de recepción" class="form-control">
                                                </div>
                                            </div>
                                            <!--Comuna de despacho-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Comuna de despacho</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="comunaDespacho_formSolicitudEnvio" id="comunaDespacho_formSolicitudEnvio" class="form-control">
                                                        <option value="0">Seleccione una comuna del listado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--Fecha de despacho-->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Fecha de despacho estimada
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="fechaDespachoEstimada_formSolicitudEnvio" name="fechaDespachoEstimada_formSolicitudEnvio" placeholder="Fecha que se espera ser retirado" class="form-control">
                                                </div>
                                            </div>
                                            <!--Intervalo de hora de despacho-->
                                            <form class="form-inline">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Intervalo de hora de despacho
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9" style="display: flex;">
                                                    <div class="col-md-6"  style="display: inline-table; padding-left: 0px;padding-right: 15px" >
                                                        <input type="time" id="horaDesde_formSolicitudEnvio" name="horaDesde_formSolicitudEnvio" placeholder="" class="form-control" style="display: inline">
                                                    </div>

                                                    <div class="col-md-6" style="display: inline-table; padding-left: 0px; padding-right: 0px;">
                                                        <input type="time" id="horaHasta_formSolicitudEnvio" name="horaHasta_formSolicitudEnvio" placeholder="" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <div class="modal-footer">
                                        <button id="aceptar_solicitud_envio" name="aceptar_solicitud_envio" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Siguiente
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
