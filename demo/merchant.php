<?php

require("../src/yaykuy.inc.php");

//Token de aplicacion
$api_token="7b554b80-92df-4aa5-bcb1-a8d2f82658a6";

//Token de comercio (identificador del comercio)
$merchant_token="12779196-af41-41cc-9001-5965706b88f4";

//Monto en pesos a cobrar
$amount_CLP="50000";

$resp= merchant_sell($api_token,$merchant_token,$amount_CLP);

echo "Status:".$resp['status']."\n";
echo "Deposit BTC (donde el cliente debe enviar los Bitcoin):".$resp['deposit_BTC']."\n";
echo "Amount_BTC: (monto en Bitcoin que el cliente debe enviar):".$resp['amount_BTC']."\n";
echo "Yky (codigo yaykuy que indentifica la orden):".$resp['yky']."\n";
echo "\n";

$btcUrn="bitcoin:".$resp['deposit_BTC']."?amount=".$resp['amount_BTC']."&message=Pago%20de%20algo";
echo "Urn de cobro en Bitcoin =>".$btcUrn."\n";
$qrImg="http://chart.apis.google.com/chart?cht=qr&chs=280x280&chl=".$btcUrn;
echo "QR para cobro => ".$qrImg."\n";
?>
