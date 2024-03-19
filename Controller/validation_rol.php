<?php
include 'connection.php';
include "../Model/consulta.php";
include 'funciones.php';

class rol /* hacer validacion usuario online */
{
    private $email;
    private $password;
    private $rol;
    function __construct($email, $password, $rol)
    {
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    function get_email()
    {
        return $this->email;
    }

    function get_password()
    {
        return $this->password;
    }

    function get_rol()
    {
        return $this->rol;
    }

    function credentials()
    {
        date_default_timezone_set('America/Lima');
        $hora = date("H:i:s");
        $email = $this->get_email();
        $pwd = $this->get_password();
        $rol = $this->get_rol();
        $uOnline = uOnline();

        $usuario = consulta_usuario($email);

        if ($usuario[1]) {
            $exist = true;
            if ($usuario[0]['email'] === $email && password_verify($pwd, $usuario[0]['pwd']) && $usuario[0]['active'] == 1) {
                switch ($rol) {
                    case 'Administrador':
                        if($usuario[0]['rol'] != 'Administrador'){
                            /* mensaje de error validacion de usuario */
                            header('Location: ../View/login.php');
                        } else{
                        $_SESSION['timer'] = "";
                        $_SESSION['admin'] = $email;
                        $_SESSION['employee'] = $email;
                        header('Location: ../View/home_admin.php');
                        set_info($usuario, $uOnline, $hora);
                        }
                        break;
                    case 'Cajero' || 'Mesero':
                        if (isset($_SESSION['admin'])) {
                        $usuario[1] == 'Cajero'? header('Location: ../View/home_cajero.php') : header('Location: ../View/home_mesero.php');
                            $_SESSION['employee'] = $email;
                            set_info($usuario, $uOnline, $hora);
                        } else {
                            ($usuario[0]['rol'] == 'Administrador') ? $_SESSION['admin'] = $email : '';
                            header('Location: ../View/login.php');
                        }
                        break;
                }
            } else {
                /* colocar mensaje de error contrasena*/
                header('Location: ../View/login.php');
            }
        } else {
            /* colocar mensaje no existe usuario */
            echo 'No existe el usuario';
        }
    }
}

class create
{
    private $var1;
    private $var2;
    private $var3;
    private $var4;
    private $var5;
    private $var6;
    private $var7;
    private $var8;
    private $var9;
    private $var10;
    private $var11;
    private $var12;
    function __construct($var1, $var2, $var3, $var4, $var5, $var6, $var7 = '', $var8 = '', $var9 = '', $var10 = '', $var11 = '', $var12 = '')
    {
        $this->var1 = $var1;
        $this->var2 = $var2;
        $this->var3 = $var3;
        $this->var4 = $var4;
        $this->var5 = $var5;
        $this->var6 = $var6;
        $this->var7 = $var7;
        $this->var8 = $var8;
        $this->var9 = $var9;
        $this->var10 = $var10;
        $this->var11 = $var11;
        $this->var12 = $var12;
    }

    /* getters usuario */

    public function getNombre1()
    {
        return $this->var1;
    }

    public function getNombre2()
    {
        return $this->var2;
    }

    public function getApellido1()
    {
        return $this->var3;
    }

    public function getApellido2()
    {
        return $this->var4;
    }

    public function getGenero()
    {
        return $this->var5;
    }

    public function getTDocumento()
    {
        return $this->var6;
    }

    public function getNDocumento()
    {
        return $this->var7;
    }

    public function getCorreo()
    {
        return $this->var8;
    }

    public function getNCelular()
    {
        return $this->var9;
    }

    public function getDireccion()
    {
        return $this->var10;
    }

    public function getImg()
    {
        return $this->var11;
    }

    public function getRol()
    {
        return $this->var12;
    }

    /* getters producto */
    public function getNombre()
    {
        return $this->var1;
    }

    public function getTamanio()
    {
        return $this->var2;
    }

    public function getTipo()
    {
        return $this->var3;
    }

    public function getPrecio()
    {
        return $this->var4;
    }

    public function getCompania()
    {
        return $this->var5;
    }

    public function getCodigoBarras()
    {
        return $this->var6;
    }

    function createUser()
    {
        $nombre1 = $this->getNombre1();
        $nombre2 = $this->getNombre2();
        $apellido1 = $this->getApellido1();
        $apellido2 = $this->getApellido2();
        $genero = $this->getGenero();
        $tDocumento = $this->getTDocumento();
        $nDocumento = $this->getNDocumento();
        $correo = $this->getCorreo();
        $nCelular = $this->getNCelular();
        $direccion = $this->getDireccion();
        $img = $this->getImg();
        $rol = $this->getRol();

        $msg = crearUsuario($nombre1, $nombre2, $apellido1, $apellido2, $genero, $tDocumento, $nDocumento, $correo, $nCelular, $direccion, $img, $rol);

        return $msg;
    }

    function createProduct()
    {
        $nombre = $this->getNombre();
        $tamanio = $this->getTamanio();
        $tipo = $this->getTipo();
        $precio = $this->getPrecio();
        $compania = $this->getCompania();
        $codigo = $this->getCodigoBarras();
        $msg = crearProducto($nombre, $tamanio, $tipo, $precio, $compania, $codigo);

        return $msg;
    }
}

class update
{
    private $var1;
    private $var2;
    private $var3;
    private $var4;
    private $var5;
    private $var6;
    private $var7;
    private $var8;
    private $var9;
    private $var10;
    private $var11;
    private $var12;
    function __construct($var1, $var2, $var3 = '', $var4 = '', $var5 = '', $var6 = '', $var7 = '', $var8 = '', $var9 = '', $var10 = '', $var11 = '', $var12 = '')
    {
        $this->var1 = $var1;
        $this->var2 = $var2;
        $this->var3 = $var3;
        $this->var4 = $var4;
        $this->var5 = $var5;
        $this->var6 = $var6;
        $this->var7 = $var7;
        $this->var8 = $var8;
        $this->var9 = $var9;
        $this->var10 = $var10;
        $this->var11 = $var11;
        $this->var12 = $var12;
    }

    /* getters usuario */

    public function getNombre1()
    {
        return $this->var1;
    }

    public function getNombre2()
    {
        return $this->var2;
    }

    public function getApellido1()
    {
        return $this->var3;
    }

    public function getApellido2()
    {
        return $this->var4;
    }

    public function getGenero()
    {
        return $this->var5;
    }

    public function getTDocumento()
    {
        return $this->var6;
    }

    public function getNDocumento()
    {
        return $this->var7;
    }

    public function getCorreo()
    {
        return $this->var8;
    }

    public function getNCelular()
    {
        return $this->var9;
    }

    public function getDireccion()
    {
        return $this->var10;
    }

    public function getRol()
    {
        return $this->var11;
    }

    public function getActive()
    {
        return $this->var12;
    }

    /* getters producto */
    public function getNombreProducto(){
        return $this->var1;
    }

    public function getTamanioProducto(){
        return $this->var2;
    }

    public function getTipoProducto(){
        return $this->var3;
    }

    public function getPrecio(){
        return $this->var4;
    }

    public function getCompany(){
        return $this->var5;
    }

    public function getCodigo(){
        return $this->var6;
    }

    public function getRefCodigo(){
        return $this->var7;
    }

    /* getter datos usuario */
    public function getUCorreo()
    {
        return $this->var1;
    }

    public function getUNCelular()
    {
        return $this->var2;
    }

    public function getUDireccion()
    {
        return $this->var3;
    }

    public function getCNDocumento()
    {
        return $this->var4;
    }

    /* getters foto perfil */
    public function getImage()
    {
        return $this->var1;
    }

    public function getICorreo()
    {
        return $this->var2;
    }


    function actualizarUsuario(){
        $nombre1 = $this->getNombre1();
        $nombre2 = $this->getNombre2();
        $apellido1 = $this->getApellido1();
        $apellido2 = $this->getApellido2();
        $genero = $this->getGenero();
        $tDocumento = $this->getTDocumento();
        $nDocumento = $this->getNDocumento();
        $correo = $this->getCorreo();
        $nCelular = $this->getNCelular();
        $direccion = $this->getDireccion();
        $rol = $this->getRol();
        $activo = $this->getActive();
        $msg = actualizarUsuario($nombre1, $nombre2, $apellido1, $apellido2, $genero, $tDocumento, $nDocumento, $correo, $nCelular, $direccion, $rol, $activo);
        return $msg;
    }

    function updateProfile()
    {
        $correo = $this->getUCorreo();
        $nCelular = $this->getUNCelular();
        $direccion = $this->getUDireccion();
        $nDocumento = $this->getCNDocumento();
        $msg = actualizarPerfil($correo, $nCelular, $direccion, $nDocumento);

        return $msg;
    }

    function updateProfileImage()
    {
        $image = $this->getImage();
        $email = $this->getICorreo();
        $msg = actualizarFotoPerfil($image, $email);
        
        return $msg;
    }

    function updateProduct(){
        $nombre = $this->getNombreProducto();
        $tamanio = $this->getTamanioProducto();
        $tProducto = $this->getTipoProducto();
        $precio = $this->getPrecio();
        $company = $this->getCompany();
        $codigo = $this->getCodigo();
        $refCodigo = $this->getRefCodigo();
        $msg = actualizarProducto ($nombre, $tamanio, $tProducto, $precio, $company, $codigo, $refCodigo);
        
        return $msg;
    }
}

class delete {
    private $var1;

    function __construct($var1){
        $this->var1 = $var1;
    }

    function getUser(){
       return $this->var1;
    }

    function getProduct(){
        return $this->var1;
     }

    function delete_user(){
        $documento = $this->getUser();
        $msg = cambiarEstado($documento);
        return $msg;
    }

    function delete_product(){
        $producto = $this->getProduct();
        $msg = borrarProducto($producto);
        return $msg;
    }
}

class mesa {
    private $var1;
    private $var2;
    private $var3;
    function __construct($var1, $var2, $var3){
        $this->var1 = $var1;
        $this->var2 = $var2;
        $this->var3 = $var3;
    }

    /* Array productos */
    function getCantidad(){
        return $this->var1;
    }

    function getId(){
        return $this->var2;
    }

    function getMesa(){
        return $this->var3;
    }

    function addTamales(){
        $cantidad = $this->getCantidad();
        $id = $this->getId();
        $mesa = $this->getMesa();

        $msg = agregarProductos($cantidad, $id, $mesa);
        return $msg;
    }
}