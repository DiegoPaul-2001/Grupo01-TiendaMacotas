<?php
session_start();
class Pedidos
{
    protected $cart_contents = array();

    //Obtener de session la matriz del carrito de compras.
    public function __construct()
    {
        $this->cart_contents = !empty($_SESSION['cart_contents']) ? $_SESSION["cart_contents"] : NULL;
        if ($this->cart_contents === NULL) {
            //Inicializamos el array en el caso de que el array sea NULL.
            $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        }
    }

    //Retornar la matriz del carrito reorganizada de la compra más reciente a la más antigua.
    public function contents()
    {
        //Reorganiza el array del ultimo elemento al primer elemento.
        $cart = array_reverse($this->cart_contents);
        //Eliminar para no crear problemas.
        unset($cart['total_items']);
        unset($cart['cart_total']);

        return $cart;
    }


    //Retorne el detalle especifico de un item.
    public function get_item($row_id)
    {
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) or
            !isset($this->cart_contents[$row_id]))
            ? FALSE
            : $this->cart_contents[$row_id];
    }
    //Retornar el conteo total de items.
    public function total_items()
    {
        return $this->cart_contents['total_items'];
    }
    //Retornar el precio total.
    public function total()
    {
        return $this->cart_contents['cart_total'];
    }
    //Guardar el contenido del array cart_contents en una session
    protected function save_cart()
    {
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;

        foreach ($this->cart_contents as $key => $val) {
            if (!is_array($val) or !isset($val['precio'], $val['cantidad'])) {
                continue;
            }
            $this->cart_contents['cart_total'] += ($val['precio'] * $val['cantidad']);
            $this->cart_contents['total_items'] += $val['cantidad'];
            $this->cart_contents[$key]['subtotal'] =
                ($this->cart_contents[$key]['precio'] * $this->cart_contents[$key]['cantidad']);
        }

        if (count($this->cart_contents) <= 2) {
            unset($_SESSION['cart_contents']);
            return false;
        } else {
            $_SESSION['cart_contents'] = $this->cart_contents;
            return true;
        }
    }


    //Insertar un elemento en el carro.
    public function insert($item = array())
    {
        if(!is_array($item) or count($item) === 0){
            return false;
        }else{
            if(!isset($item['masid'],$item['especie'],$item['precio'],$item['cantidad'])){
                return false;
            }else{
                //insertar elemento
                $item['cantidad'] = (float) $item['cantidad'];
                if($item['cantidad']==0){
                    return false;
                }
                $item['precio'] = (float)$item['precio'];
                //Genera un código unico para el identificador de fila.
                $rowid = md5($item['masid']);
                $_cantidad = isset($item['cantidad']) ? $item['cantidad'] : 0;
                $item['rowid'] = $rowid;
                $item['cantidad'] = $_cantidad;
                $this->cart_contents[$rowid] = $item;
                if($this->save_cart()){
                    return isset($rowid) ? $rowid : true;
                }else{
                    false;
                }
            }
        }
    }

    //Actualizar carrito
    public function updateitem($item = array()){
        if (!is_array($item) or count($item) === 0) {
            return false;
        }else{
            if (!isset($item['rowid'],$this->cart_contents[md5($item['rowid'])])) {
                return false;
            }else{
                if (isset($item['cantidad'])) {
                    $item['cantidad'] = (Float)$item['cantidad'];
                    if($item['cantidad'] == 0){
                        $this->remove($item['rowid']);
                    }                
                }             
                $this->cart_contents[md5($item['rowid'])]['cantidad']=$item['cantidad'];
                $this->save_cart();
                return true;
            }
        }
    }


    //Remover un item del el carro.
    public function remove($row_id)
    {
        unset($this->cart_contents[md5($row_id)]);
        $this->save_cart();
        return true;
    }

    //Limpiar el carro y a destruir la session.
    public function destroy()
    {
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['cart_contents']);
    }
}
