<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="registroNombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="nombre" name="registroNombre" />
            </div>
        </div>
        <div class="form-group">
            <label for="registroEmail">Correo electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <input type="email" class="form-control" id="email" name="registroEmail" />
            </div>
        </div>
        <div class="form-group">
            <label for="registroPassword">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" id="pwd" name="registroPassword" />
            </div>
        </div>
        <?php
        $registro = ControladorFormularios::ctrRegistro();
        if ($registro == "ok") {
            echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>';
            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
        }
        ?>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>