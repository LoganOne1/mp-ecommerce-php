

<?php
  require __DIR__ .  '/vendor/autoload.php';

  MercadoPago\SDK::setAccessToken("TEST-6996837324494455-070413-1940117e2745318954948f9c169e1732-385094705");
  switch($_POST["type"]) {
      case "payment":
          $payment = MercadoPago\Payment::find_by_id($_POST["data"]["id"]);
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
              break;

      case "point_integration_wh":
          // $_POST contiene la informaciòn relacionada a la notificaciòn.
          break;
  }

?>
