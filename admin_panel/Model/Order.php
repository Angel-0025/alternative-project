<?php
namespace Phppot;

use Phppot\DataSource;

class Order
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getAllOrders()
    {
        $query = "SELECT * FROM order_table";
        $result = $this->ds->select($query);
        return $result;
    }

    function getAllOrdersArchive()
    {
        $query = "SELECT * FROM order_archive";
        $result = $this->ds->select($query);
        return $result;
    }

    function getPdfGenerateValues($id)
    {
        $query = "SELECT * FROM order_table WHERE id='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getPdfGenerateValuesArchive($id)
    {
        $query = "SELECT * FROM order_archive WHERE order_id='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getOrderItems($order_id)
    {
        $sql = "SELECT order_table_item.*,product.name FROM order_table_item
                JOIN product ON order_table_item.product_id=product.product_id WHERE order_table_item.order_id='" . $order_id . "'";
        $query = "SELECT * FROM order_table_item WHERE order_id='" . $order_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getOrderItemsArchive($order_id)
    {
        $sql = "SELECT order_table_item.*,product.name FROM order_table_item
                JOIN product ON order_table_item.product_id=product.product_id WHERE order_table_item.order_id='" . $order_id . "'";
        $query = "SELECT * FROM order_table_item WHERE order_id='" . $order_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getProduct($product_id)
    {
        $query = "SELECT * FROM product WHERE product_id='" . $product_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }
}
