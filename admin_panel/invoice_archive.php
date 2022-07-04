<?php
use Phppot\Order;

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$result = $orderModel->getPdfGenerateValuesArchive($_GET["id"]);
$orderItemResult = $orderModel->getOrderItemsArchive($result[0]["id"]);
if (! empty($result)) {
    require_once __DIR__ . "/lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $orderItemResult);
}