<?php
require_once 'models/pedido.php';
class pedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];


            if ($provincia && $localidad && $direccion) {
                //?Guardar datos a la base de datos
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //?Guardar Linea Pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "completed";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }
            header("Location:" . baseUrl . "pedido/confirmado");
        } else {
            //?Redirigir al index
            header("Location" . baseUrl);
        }
    }
    public function confirmado()
    {

        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function misPedidos()
    {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        //?Sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //?SACAR EL PEDIDO
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //?SACAR LOS PRODUCTOS
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);
            

        }else{
            header("Location:".baseUrl."pedido/mis_pedidos");
        }

        require_once 'views/pedido/detalle.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
        
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //?Recoger datos del form
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            //?UPDATE DEL PEDIDO
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);

            $pedido->updateOne();
            header("Location:". baseUrl.'pedido/detalle&id='.$id);

        }else{
            header("Location:". baseUrl);
        }
    }
}
