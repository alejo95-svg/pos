<?php

if (!function_exists('set_rol')) {
    function set_rol()
    {
        if (isset ($_POST['submit_rol'])) {
            $rol = $_POST['rol'];
            $_SESSION['save_rol'] = $rol;
        } else {
            $rol = $_SESSION['save_rol'];
        }
        return $rol;
    }
}

if (!function_exists('set_info')) {
    function set_info($datos, $online, $hora)
    {
        $_SESSION['user'] = $datos[0]['name_1'] . ' ' . $datos[0]['lastName_1'];
        $_SESSION['id_user'] = $datos[0]['Id_user'];
        if ($online[2]) {
            ($online[0]['Id_user'] == $datos[0]['Id_user']) ? header('location: ../index.php') : insertar($datos, $hora);
        } else {
            insertar($datos, $hora);
        }
        /*  $GLOBALS['conn']->close(); */
    }
}

if (!function_exists('flag')) {
    function flag($data)
    {
        if ($data[1]) {
            $_SESSION['flag'] = true;
            $_SESSION['msg'] = $data[0];
        } else {
            $_SESSION['flag'] = false;
            $_SESSION['msg'] = $data[0];
        }
    }
}

if (!function_exists('msg')) {
    function msg()
    {
        $msg = $_SESSION['msg'];

        echo '
                <div class="float">
                    <div class="container-msg-check">
                        <h3>' . $msg . '</h3>
                        <img src="../img/icon_check.png" class="icon-check" alt="check">
                    </div>
                </div>
                ';
    }
}

if(!function_exists('formAddProduct')){
    function formAddProduct(){
        echo '
            <form action="../Controller/variables.php" method="POST">
                <input type="submit" class="button-add-product" name="add-product-table" value="AGREGAR PRODUCTO">
            </form>
        ';
    }
}

if (!function_exists('menu')) {
    function menu()
    {
        $cont = 0;
        $j = 0;
        $tamales = consulta_producto ('','tamal')[2];
        foreach($tamales as $tamales){
            $cont += 1;
            $_SESSION['tamales'][$cont - 1] = $tamales; 
        }
        $cont = 0;
/*         for($i = 0; $i <=3; $i++){ */
        $bebidas = consultaBebidas ('jugos')[2];
        foreach($bebidas as $bebidas){
            $cont += 1; 
            $_SESSION['jugos'][$cont] = $bebidas; 
        }


/*         } */
        echo '
            <form action="../Controller/variables.php" method="POST">
                <input type="submit" class="products-buttons" name="tamales" value="TAMALES">
            </form>

            <form action="../Controller/variables.php" method="POST">
                <input type="submit" class="products-buttons" name="bebidas" value="BEBIDAS">
            </form>

            <form action="../Controller/variables.php" method="POST">
                <input type="submit" class="products-buttons" name="paquetes" value="PAQUETES">
            </form>

            <form action="../Controller/variables.php" method="POST">
                <input type="submit" class="products-buttons" name="otros" value="OTROS">
            </form>
        ';
    }
}

if (!function_exists('bebidas')) {
    function bebidas()
    {
        $type = ['Jugo', 'Gaseosa', 'Bebida Caliente', 'Bebida Fria'];
        echo '
                <form action="../Controller/variables.php" class="container-products" method="POST">
                    <input type="submit" class="products-buttons" name="jugos" value="JUGOS">
                </form>

                <form action="../Controller/variables.php" class="container-products" method="POST">
                    <input type="submit" class="products-buttons" name="gaseosas" value="GASEOSAS">
                </form>

                <form action="../Controller/variables.php" class="container-products" method="POST">
                    <input type="submit" class="products-buttons" name="bebidasCalientes" value="BEBIDAS CALIENTES">
                </form>

                <form action="../Controller/variables.php" class="container-products" method="POST">
                    <input type="submit" class="products-buttons" name="bebidasFrias" value="BEBIDAS FRIAS">
                </form>
            ';
    }
}

if (!function_exists('tamales')) {
    function tamales($mesa)
    {
        for ($i = 0; $i <= count($_SESSION['tamales']) - 1; $i++) {
            $id = consulta_producto('', '', $_SESSION['tamales'][$i]['name'])[0];
            $idProducto[$i] = "id_" . $id['Id_product'];
            $clasesJs[$i] = "add_quantity_" . $_SESSION['tamales'][$i]['name'];
            $btnMinus[$i] = "btn_minus_" . $_SESSION['tamales'][$i]['name'];
            $btnPlus[$i] = "btn_plus_" . $_SESSION['tamales'][$i]['name'];
            echo '
                <form action="../Controller/variables.php" class="container-products" method="POST">
                    <input type="hidden" name="mesa" value="' . $mesa['Id_mesa'] . '">
                    <div class="button-add-tamales">
                        <p>' . $_SESSION['tamales'][$i]['name'] . '</p>
                        <div class="container-quantity">
                            <button type="button" class="btn-quantity ' . $btnMinus[$i] . '">-</button>
                            <input type="text" class="add-quantity ' . $clasesJs[$i] . '" name="' . $_SESSION['tamales'][$i]['name'] . '" value="0" readonly>
                            <input type="hidden" name="id_' . $i . '" value="' . $id['Id_product'] . '">
                            <button type="button" class="btn-quantity ' . $btnPlus[$i] . '">+</button>
                        </div>
                    </div>
                    <script>
                        const ' . $clasesJs[$i] . ' = document.querySelector(".' . $clasesJs[$i] . '");
                        const ' . $btnMinus[$i] . ' = document.querySelector(".' . $btnMinus[$i] . '");
                        const ' . $btnPlus[$i] . ' = document.querySelector(".' . $btnPlus[$i] . '");
                        
                        ' . $btnMinus[$i] . '.addEventListener("click", () => {
                            if(' . $clasesJs[$i] . '.value <= 0){
                                ' . $clasesJs[$i] . '.value = 0;
                            }else {
                                ' . $clasesJs[$i] . '.value--;
                            }
                        });

                        ' . $btnPlus[$i] . '.addEventListener("click", () => {
                            if(' . $clasesJs[$i] . '.value >= 9999){
                                ' . $clasesJs[$i] . '.value = 9999;
                            }else {
                                ' . $clasesJs[$i] . '.value++;
                            }
                        });
                    </script>
            ';
        }
        echo '
                    <input type="submit" class="btn-add-product" name="agregar-cantidades-tamal" value="Agregar">
                </form>
            ';
    }
}

if (!function_exists('jugos')) {
    function jugos($mesa)   
    {
        print_r($_SESSION['jugos']);
        for ($i = 0; $i <= count($_SESSION['jugos']) - 1; $i++) {
            $id = consulta_producto('', '', $_SESSION['tamales'][$i]['name'])[0];
            $idProducto[$i] = "id_" . $id['Id_product'];
            $clasesJs[$i] = "add_quantity_" . $_SESSION['tamales'][$i]['name'];
            $btnMinus[$i] = "btn_minus_" . $_SESSION['tamales'][$i]['name'];
            $btnPlus[$i] = "btn_plus_" . $_SESSION['tamales'][$i]['name'];
            echo '
                <form action="../Controller/variables.php" class="container-products" method="POST">
                    <input type="hidden" name="mesa" value="' . $mesa['Id_mesa'] . '">
                    <div class="button-add-tamales">
                        <p>' . $_SESSION['tamales'][$i]['name'] . '</p>
                        <div class="container-quantity">
                            <button type="button" class="btn-quantity ' . $btnMinus[$i] . '">-</button>
                            <input type="text" class="add-quantity ' . $clasesJs[$i] . '" name="' . $_SESSION['tamales'][$i]['name'] . '" value="0" readonly>
                            <input type="hidden" name="id_' . $i . '" value="' . $id['Id_product'] . '">
                            <button type="button" class="btn-quantity ' . $btnPlus[$i] . '">+</button>
                        </div>
                    </div>
                    <script>
                        const ' . $clasesJs[$i] . ' = document.querySelector(".' . $clasesJs[$i] . '");
                        const ' . $btnMinus[$i] . ' = document.querySelector(".' . $btnMinus[$i] . '");
                        const ' . $btnPlus[$i] . ' = document.querySelector(".' . $btnPlus[$i] . '");
                        
                        ' . $btnMinus[$i] . '.addEventListener("click", () => {
                            if(' . $clasesJs[$i] . '.value <= 0){
                                ' . $clasesJs[$i] . '.value = 0;
                            }else {
                                ' . $clasesJs[$i] . '.value--;
                            }
                        });

                        ' . $btnPlus[$i] . '.addEventListener("click", () => {
                            if(' . $clasesJs[$i] . '.value >= 9999){
                                ' . $clasesJs[$i] . '.value = 9999;
                            }else {
                                ' . $clasesJs[$i] . '.value++;
                            }
                        });
                    </script>
            ';
        }
        echo '
                    <input type="submit" class="btn-add-product" name="agregar-cantidades-tamal" value="Agregar">
                </form>
            ';
    }
}
