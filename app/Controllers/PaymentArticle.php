<?php
try {
  // SDK de Mercado Pago
  require __DIR__ .  '/../../vendor/autoload.php';

  // Agrega credenciales
  MercadoPago\SDK::setAccessToken('TEST-2926550097213535-092911-9f95049df86420b3055add7ae6e0e56e-1160956296');
  MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

  $image_src = substr($_POST['img'], 1);
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $hostPathImage = $protocol . $_SERVER['HTTP_HOST'].$image_src;
  // Crea un objeto de preferencia
  $preference = new MercadoPago\Preference();

  //se crea el pagador tipo Object
  $payer = new MercadoPago\Payer();
  $payer->name = 'Lalo';
  $payer->surname = 'Landa';
  $payer->email = 'test_user_94708656@testuser.com';
  $payer->phone = array(
    "area_code" => "52",
    "number" => "7713436695"
  );
  $payer->address = array(
    "zip_code" => "1111",
    "street_name" => "Calle falsa",
    "street_number" => "43440",
  );

  // Crea un ítem en la preferencia
  $item = new MercadoPago\Item();
  $item->id = 2828;
  $item->title = $_POST['title'];
  $item->description = 'Dispositivo móvil de Tienda e-commerce';
  $item->picture_url = $hostPathImage;
  $item->quantity = 1;
  $item->unit_price = 56.00;
  $preference->items = array($item);
  $preference->payer = $payer;

  //payment methods }
  $preference->payment_methods = array(
  "excluded_payment_methods" => array(
    array("id" => "visa")
  ),
  "installments" => 6
);

  $preference->notification_url = "https://brandonsa-mp-commerce-php-b8713d8c3711.herokuapp.com//webhook.php";
  $preference->external_reference = 'bsan5293@gmail.com';
    $preference->auto_return = "all";
    $preference->back_urls = array(
    "success" =>"https://brandonsa-mp-commerce-php-b8713d8c3711.herokuapp.com/app/callbacks/success.php",
    "failure" => "https://brandonsa-mp-commerce-php-b8713d8c3711.herokuapp.com/app/callbacks/failure.php",
    "pending" =>  "https://brandonsa-mp-commerce-php-b8713d8c3711.herokuapp.com/app/callbacks/pending.php"
);

  $preference->save();


  // Resto del código...

  // Puedes agregar más instrucciones aquí

} catch (Exception $e) {
  // Captura cualquier excepción ocurrida dentro del bloque try
  $error_log ='Error: ' . $e->getMessage();
  // Maneja la excepción según tus necesidades, puedes mostrar un mensaje de error o registrar el error en un archivo de registro, por ejemplo.
  echo 'Error: ' . $e->getMessage();
}
?>
