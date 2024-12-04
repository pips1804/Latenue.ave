<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

include '../admin_panel/config/dbconnect.php';
require '../vendor/autoload.php';

session_start();

if (!isset($_POST['email'], $_POST['name'])) {
    die('Invalid session. Please log in again.');
}

$order_id = $_POST["order_id"];
$email = $_POST['email'];
$customer_name = $_POST['name'];
$tax = .12;
$shipping_fee = 100;

$getQuantity = "SELECT
            OD.quantity,
            V.unit_price,
            P.product_name
        FROM
            order_details OD
        INNER JOIN
            product_size_variation V ON OD.variation_id = V.variation_id
        INNER JOIN
            product P ON V.product_id = P.product_id
        WHERE
            OD.order_id = $order_id";
$result = $conn->query($getQuantity);

$order_items = [];
while ($row = $result->fetch_assoc()) {
    $order_items[] = $row;
}

$grand_total = 0;
$items_rows = '';

foreach ($order_items as $item) {
    $item_total = $item['quantity'] * $item['unit_price'];
    $grand_total += $item_total;

    $items_rows .= '<tr>
        <td>' . htmlspecialchars($item['product_name']) . '</td>
        <td>' . htmlspecialchars($item['quantity']) . '</td>
        <td>₱' . number_format($item['unit_price'], 2) . '</td>
        <td>₱' . number_format($item_total, 2) . '</td>
    </tr>';
}
$total_tax = $grand_total * $tax;
$total_amount = $shipping_fee + $total_tax + $grand_total;

$getPaymentMethod = "SELECT mp.payment_method
                     FROM mode_of_payment mp
                     INNER JOIN orders o ON o.payment_method_id = mp.payment_method_id
                     WHERE o.order_id = $order_id";
$result1 = $conn->query($getPaymentMethod);

$payment_method = '';
if ($row1 = $result1->fetch_assoc()) {
    $payment_method = $row1['payment_method'];
}

$htmlFile = 'invoice_template.html';
$htmlContent = file_get_contents($htmlFile);
$htmlContent = str_replace('{{customer_name}}', htmlspecialchars($customer_name), $htmlContent);
$htmlContent = str_replace('{{payment_method}}', htmlspecialchars($payment_method), $htmlContent);
$htmlContent = str_replace('{{items_rows}}', $items_rows, $htmlContent);
$htmlContent = str_replace('{{grand_total}}', '₱' . number_format($total_amount, 2), $htmlContent);
$htmlContent = str_replace('{{shipping}}', '₱' . number_format($shipping_fee, 2), $htmlContent);
$htmlContent = str_replace('{{tax}}', '₱' . number_format($total_tax, 2), $htmlContent);

$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($htmlContent);


$dompdf->setPaper('A4', 'portrait');


$dompdf->render();


$pdfFilePath = '../invoices/invoice_' . $order_id . '.pdf';
file_put_contents($pdfFilePath, $dompdf->output());


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ibaneziiiwilfredol.pdm@gmail.com';
    $mail->Password = 'lmog zekg secy siqy';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('ibaneziiiwilfredol.pdm@gmail.com', 'Latenue.Ave');
    $mail->addAddress($email, $customer_name);

    $mail->isHTML(true);
    $mail->Subject = 'Your Invoice from Latenue.Ave';
    $mail->Body = $htmlContent;

    $mail->send();

    echo 'Invoice sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$user_id_query = "SELECT user_id FROM orders WHERE order_id = ?";
$stmt = $conn->prepare($user_id_query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_row = $user_result->fetch_assoc()) {
    $user_id = $user_row['user_id'];
} else {
    die('Error: Could not find user_id for this order.');
}

$stmt_invoice = $conn->prepare("INSERT INTO invoice (user_id, order_id, invoice_total_amount) VALUES (?,?,?)");
$stmt_invoice->bind_param("iid", $user_id, $order_id, $total_amount);
$stmt_invoice->execute();
