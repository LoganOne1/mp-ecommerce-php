

<?php
  require __DIR__ .  '/vendor/autoload.php';

  MercadoPago\SDK::setAccessToken("TEST-6996837324494455-070413-1940117e2745318954948f9c169e1732-385094705");
  switch($_POST["type"]) {
      case "payment":
          $payment = MercadoPago\Payment::find_by_id($_POST["data"]["id"]);
          echo $payment;
          break;
      case "plan":
          $plan = MercadoPago\Plan::find_by_id($_POST["data"]["id"]);
          break;
      case "subscription":
          $plan = MercadoPago\Subscription::find_by_id($_POST["data"]["id"]);
          break;
      case "invoice":
          $plan = MercadoPago\Invoice::find_by_id($_POST["data"]["id"]);
          break;
          case"test":
              $test = MercadoPago\Test::find_by_id($_POST["data"]["id"]);
              echo $test;
              break;

      case "point_integration_wh":
          // $_POST contiene la informaciòn relacionada a la notificaciòn.
          break;
  }

  $json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

$file = fopen("/tmp/mp_webhook_data.json", "a") or die("Cannot open file.");
fwrite($file, $json);
fclose($file);

// render json response
header('Content-Type: application/json');
// echo json_encode($data);
echo $json;

?>
