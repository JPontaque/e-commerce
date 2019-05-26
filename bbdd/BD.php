<?php
/** Clase que permite comunicarse con la Base de Datos
 */
require_once('configuracion.php');
class BD {

    private $conexion;

    /**
     * Constructor. Permite conectar con la Base de Datos
     */
    function __construct() {
        $this->conectar();
    }

    /**
     * Conecta con la Base de Datos
     */
    function conectar() {
        // Suponemos que en un fichero de configuración hemos definido
        // unas constantes con la configuración de la conexión
        $this->conexion = new mysqli(HOST_BD, USUARIO_BD, CONTRASENA_BD, NOMBRE_BD);
    }

    /**
     * Desconecta de la Base de Datos
     */
    function desconectar() {
        $this->conexion->close();
    }

    /**
     * Obtiene el último generado en la última sentencia INSERT
     * \return El id que se generó
     */
    function ultimo_id() {
        return $this->conexion->insert_id;
    }

    /**
     * Lanza cualquier tipo de sentencia con o sin parámetros
     * \param sql La sentencia a ejecutar
     * \param parametros Los parámetros, si los hay
     * \return El resultado de la consulta
     */
    function lanzar_consulta($sql, $parametros = array()) {

        $sentencia = $this->conexion->prepare($sql);
        if (!empty($parametros)) {
            $tipos = "";
            foreach ($parametros as $parametro) {
                if (gettype($parametro) == "string")
                    $tipos = $tipos . "s";
                else
                    $tipos = $tipos . "i";
            }
            $sentencia->bind_param($tipos, ...$parametros);
        }

        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $sentencia->close();

        return $resultado;
    }
}