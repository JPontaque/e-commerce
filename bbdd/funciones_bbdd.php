<?php
require_once('Db.php');

function logear($usuario){
    $bbdd = new Db();

    $sql = 'SELECT * FROM usuarios WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $resultado = array();

    if($consulta->num_rows == 1){
        $linea = $consulta->fetch_row();
        $resultado['login'] = true;
        $resultado['usuario'] = $linea[1];
        $resultado['contrasena'] = $linea[2];
        $resultado['nombre'] = $linea[3];
        $resultado['apellidos'] = $linea[4];
        $resultado['email'] = $linea[5];
        $resultado['telefono'] = $linea[6];
        $resultado['direccion'] = $linea[7];
        $resultado['fecha_registro'] = $linea[8];
        $resultado['is_admin'] = $linea[9] == 'Si';
    } else {
        $resultado['login'] = false;
    }
    $bbdd->desconectar();
    return $resultado;
}

function usuario_unico($usuario){
    $bbdd = new Db();

    $sql = 'SELECT usuario FROM usuarios WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $resultado = array();

    if($consulta->num_rows == 0){
        $resultado['registro'] = true;
    } else {
        $resultado['registro'] = false;
    }
    $bbdd->desconectar();
    return $resultado;
}

function insertar_usuario($usuario, $password, $nombre, $apellidos, $email, $telefono, $direccion){
    $bbdd = new Db();

    $sql = 'INSERT INTO usuarios (usuario, contrasena, nombre, apellidos, email, telefono, direccion, administrador) VALUES (?, ?, ?, ?, ?, ?, ?, ' . '"No");';
    $parametros = array($usuario, $password, $nombre, $apellidos, $email, $telefono, $direccion);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function get_cantidad_productos(){
    $bbdd = new Db();

    $sql = 'SELECT COUNT(*) FROM productos';
    $consulta = $bbdd->lanzar_consulta($sql);
    $linea = $consulta->fetch_row();
    $resultado = $linea[0];

    $bbdd->desconectar();
    return $resultado;
}

function contrasena_nueva($contrasena, $usuario){
    $bbdd = new Db();

    $sql = 'UPDATE usuarios SET contrasena = ? WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($contrasena, $usuario);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function eliminar_cuenta($usuario){
    $bbdd = new Db();

    $sql = 'DELETE FROM usuarios WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function usuario_datos_nuevos($usuario, $email, $nombre, $apellidos, $telefono, $direccion, $usuarioA){
    $bbdd = new Db();

    $sql = 'UPDATE usuarios SET usuario = ?, email = ?, nombre = ?, apellidos = ?, telefono = ?, direccion = ? WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario, $email, $nombre, $apellidos, $telefono, $direccion, $usuarioA);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function buscar_usuario($id){
    $bbdd = new Db();

    $sql = 'SELECT * FROM usuarios WHERE id = ?';
    $parametros = array($id);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $resultado = array();

    if($consulta->num_rows == 1){
        $linea = $consulta->fetch_row();
        $resultado['usuarioM'] = $linea[1];
    }

    $bbdd->desconectar();
    return $resultado;
}

function usuario_hacer_admin($admin, $usuario){
    $bbdd = new Db();

    $sql = 'UPDATE usuarios SET administrador = ? WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($admin, $usuario);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function producto_unico($producto){
    $bbdd = new Db();

    $sql = 'SELECT producto FROM productos WHERE CONVERT(producto,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($producto);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $resultado = array();

    if($consulta->num_rows == 0){
        $resultado['registro'] = true;
    } else {
        $resultado['registro'] = false;
    }
    $bbdd->desconectar();
    return $resultado;
}

function insertar_producto($producto, $descripcion, $imagen, $precio){
    $bbdd = new Db();

    $sql = 'INSERT INTO productos (producto, descripcion, foto, precio) VALUES (?, ?, ?, ?);';
    $parametros = array($producto, $descripcion, $imagen, $precio);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function buscar_producto($id){
    $bbdd = new Db();

    $sql = 'SELECT * FROM productos WHERE id = ?';
    $parametros = array($id);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $resultado = array();

    if($consulta->num_rows == 1){
        $linea = $consulta->fetch_row();
        $resultado['productoM'] = $linea[1];
        $resultado['productoP'] = $linea[4];
        $resultado['productoF'] = $linea[3];
    }

    $bbdd->desconectar();
    return $resultado;
}

function producto_datos_nuevos($producto, $descripcion, $imagen, $precio, $productoM){
    $bbdd = new Db();

    $sql = 'UPDATE productos SET producto = ?, descripcion = ?, foto = ?, precio = ? WHERE CONVERT(producto,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($producto, $descripcion, $imagen, $precio, $productoM);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function eliminar_producto($producto){
    $bbdd = new Db();

    $sql = 'DELETE FROM productos WHERE CONVERT(producto,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($producto);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function producto_carrito_annadir($usuario, $producto, $precio, $foto){
    $bbdd = new Db();

    $sql = 'INSERT INTO carritos (usuario, producto, precio, foto) VALUES (?, ?, ?, ?);';
    $parametros = array($usuario, $producto, $precio, $foto);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function suma_producto_carrito($usuario){
    $bbdd = new Db();

    $sql = 'SELECT SUM(precio) FROM carritos WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $resultado = array();

    if($consulta->num_rows == 1){
        $linea = $consulta->fetch_row();
        $resultado['precioT'] = $linea[0];
    }

    $bbdd->desconectar();
    return $resultado;
}

function eliminar_producto_usuario($usuario, $fecha){
    $bbdd = new Db();

    $sql = 'DELETE FROM carritos WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY) AND CONVERT(fecha_adquirido,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario, $fecha);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function factura($usuario, $cantidad_producto, $precio_total, $id_factura){
    $bbdd = new Db();

    $sql = 'INSERT INTO facturas (usuario, cantidad_producto, precio_total, id_factura) VALUES (?, ?, ?, ?);';
    $parametros = array($usuario, $cantidad_producto, $precio_total, $id_factura);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function contar_productos_factura($usuario){
    $bbdd = new Db();

    $sql = 'SELECT COUNT(*) FROM carritos WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $consulta = $bbdd->lanzar_consulta($sql, $parametros);
    $linea = $consulta->fetch_row();
    $resultado = $linea[0];

    $bbdd->desconectar();
    return $resultado;
}

function eliminar_producto_factura($usuario){
    $bbdd = new Db();

    $sql = 'DELETE FROM carritos WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}

function eliminar_usuario_factura($usuario)
{
    $bbdd = new Db();

    $sql = 'DELETE FROM facturas WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
    $parametros = array($usuario);
    $bbdd->lanzar_consulta($sql, $parametros);

    $bbdd->desconectar();
}