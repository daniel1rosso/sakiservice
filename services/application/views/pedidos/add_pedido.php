<div class="page-wrapper">
<div class="page-container">
<!--Begin Page Content-->
<div class="container-fluid addPedidos">
    <form id="formSolicitudEnvio" class="form-horizontal" role="form" action="#" method="POST" enctype="multipart/form-data">
        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="padding-top: 2%;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nuevo Pedido</h6>
            </div>

            <input type="hidden" id="idClienteEnvio_formSolicitudEnvio" name="idClienteEnvio_formSolicitudEnvio" value="<?= $user['idUsuario'] ?>">
            <input type="hidden" id="idPedido_formSolicitudEnvio" name="idPedido_formSolicitudEnvio" value="">
            <input type="hidden" id="montoTotal_formSolicitudEnvio" name="montoTotal_formSolicitudEnvio" value="0">
            <input type="hidden" id="cantidad_pedidos_formSolicitudEnvio" name="cantidad_pedidos_formSolicitudEnvio" value="0">

            <div class="card-body">
                <div class="row">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-4">
                                <label class=" form-control-label" style="font-weight: bold;text-decoration: underline;">Cliente</label>
                                <input type="text" id="nombreClienteEnvio_formSolicitudEnvio" name="nombreClienteEnvio_formSolicitudEnvio" placeholder="Cliente" class="form-control" value="<?= $user['apellido'] . ', ' . $user['nombreCompleto'] ?>" disabled>
                            </div>
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label" style="font-weight: bold;">Teléfono</label>
                                <input type="number" id="telefono_formSolicitudEnvio" name="telefono_formSolicitudEnvio" placeholder="Número" class="form-control" >
                            </div>
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">Empresa</label>
                                <input type="text" id="empresa_formSolicitudEnvio" name="empresa_formSolicitudEnvio" placeholder="Empresa" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-8">
                                <label for="text-input" class=" form-control-label">Dirección de retiro</label>
                                <input type="text" id="direccion_formSolicitudEnvio" name="direccion_formSolicitudEnvio" placeholder="Dirección" class="form-control" >
                            </div>
                            <div class="col col-md-4">
                                <label for="select" class="form-control-label">Comuna de retiro</label>
                                <select name="comuna_formSolicitudEnvio" id="comuna_formSolicitudEnvio" class="form-control" required style="padding-right: 0px;">
                                    <option value="0">Seleccionar comuna</option>
                                    <?php
                                    if (isset($comunas)) :
                                        for ($i = 0; $i < count($comunas); $i++) :
                                            echo '<option value="' . $comunas[$i]['idComuna'] . '">' . $comunas[$i]['nombre'] . '</option>';
                                        endfor;
                                    endif;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Fecha de retiro</label>
                                <input type="date" id="fechaRetiro_formSolicitudEnvio" name="fechaRetiro_formSolicitudEnvio" placeholder="Fecha que se espera ser retirado" class="form-control">
                            </div>
                            <div class="col-md-9">
                                <label for="text-input" class=" form-control-label">Intervalo de hora de retiro</label>
                                <div style="display: flex;">
                                    <input type="time" id="horaDesde_formSolicitudEnvio" name="horaDesde_formSolicitudEnvio" placeholder="" class="form-control col-md-6">
                                    <input type="time" id="horaHasta_formSolicitudEnvio" name="horaHasta_formSolicitudEnvio" placeholder="" class="form-control col-md-6">
                                </div>
                            </div>
                        </div>
                        <label for="text-input" class=" form-control-label" style="margin-top: 4%;color: darkgray;margin-bottom: inherit;">Detalle del pedido</label>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label">Nombre del receptor</label>
                                <input type="text" id="nombreReceptor_formSolicitudEnvio" name="nombreReceptor_formSolicitudEnvio" placeholder="Nombre" class="form-control">
                            </div>
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label">Teléfono del receptor</label>
                                <input type="number" id="telefonoDespacho_formSolicitudEnvio" name="telefonoDespacho_formSolicitudEnvio" placeholder="Número" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-8">
                                <label for="text-input" class=" form-control-label">Dirección de despacho</label>
                                <input type="text" id="direccionDespacho_formSolicitudEnvio" name="direccionDespacho_formSolicitudEnvio" placeholder="Dirección" class="form-control">
                            </div>
                            <div class="col col-md-4">
                                <label for="select" class=" form-control-label">Comuna de despacho</label>
                                <select name="comunaDespacho_formSolicitudEnvio" id="comunaDespacho_formSolicitudEnvio" class="form-control" required style="padding-right: 0px;">
                                        <option value="0">Seleccionar comuna</option>
                                        <?php
                                        if (isset($comunas)) :
                                            for ($i = 0; $i < count($comunas); $i++) :
                                                echo '<option value="' . $comunas[$i]['idComuna'] . '">' . $comunas[$i]['nombre'] . '</option>';
                                            endfor;
                                        endif;
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Fecha de despacho</label>
                                <input type="date" id="fechaDespachoEstimada_formSolicitudEnvio" name="fechaDespachoEstimada_formSolicitudEnvio" placeholder="Fecha que se espera ser retirado" class="form-control">
                            </div>
                            <div class="col-md-9">
                                <label for="text-input" class=" form-control-label">Intervalo de hora de despacho</label>
                                <div style="display: flex;">
                                    <input type="time" id="horaDesde1_formSolicitudEnvio" name="horaDesde1_formSolicitudEnvio" placeholder="" class="form-control col-md-6">
                                    <input type="time" id="horaHasta1_formSolicitudEnvio" name="horaHasta1_formSolicitudEnvio" placeholder="" class="form-control col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label" >Cantidad</label>
                                <input type="number" id="cantidad_formSolicitudEnvio" name="cantidad_formSolicitudEnvio" placeholder="Cantidad de productos a enviar" class="form-control" >
                            </div>
                            <div class="col col-md-6">
                                <label for="select" class=" form-control-label">Tamaño estimado de los paquetes</label>
                                <select name="tamaño_producto" id="tamaño_producto" class="form-control">
                                    <option value="0">Seleccione un tamaño</option>
                                    <option value="1">Grande</option>
                                    <option value="2">Mediano</option>
                                    <option value="3">Pequeño</option>
                                </select>
                            </div>
                        </div>
                        <!-- Descripción del producto -->
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <label for="textarea-input" class=" form-control-label">Observaciones</label>
                                <textarea name="observacion_pedido" id="observacion_pedido" rows="2" placeholder="Observacióm extra sobre el pedido solicitante" class="form-control" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <button class="btn btn-lg btn-info btn-block" id="detalle_pedido_js" name="detalle_pedido_js"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nuevo Detalle Pedido</button>
                                <input type="hidden" id="montoTotal_formSolicitudEnvio" name="montoTotal_formSolicitudEnvio" value="0">
                                <input type="hidden" id="cantidad_pedidos_formSolicitudEnvio" name="cantidad_pedidos_formSolicitudEnvio" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive m-b-40">                   
                    <table class="table table-borderless table-data3 tablaAddPedidos" id="listado_add_pedidos" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nro de pedido</th>
                                <th class="text-center">Apellido, Nombre</th>
                                <th class="text-center">Comuna Destino</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Tamaño</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <button class="btn btn-lg btn-info btn-block" id="add_pedido_js"><i class="fas fa-save"></i>&nbsp;&nbsp;Guardar Pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
