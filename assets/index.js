// Add SDK credentials
// REPLACE WITH YOUR PUBLIC KEY AVAILABLE IN: https://developers.mercadopago.com/panel
const mercadopago = new MercadoPago('APP_USR-a68157fb-5513-4dc7-adbf-709ba3e46766', {
  locale: '<LOCALE>' // The most common are: 'pt-BR', 'es-AR' and 'en-US'
});

// Handle call to backend and generate preference.
document.getElementById("checkout-btn").addEventListener("click", function () {

  $('#checkout-btn').attr("disabled", true);

  const orderData = {
    quantity: document.getElementById("quantity").value,
    description: document.getElementById("product-description").innerHTML,
    price: document.getElementById("unit-price").innerHTML
  };

  fetch("http://localhost:8080/create_preference", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(orderData),
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (preference) {
      createCheckoutButton(preference.id);

      $(".shopping-cart").fadeOut(500);
      setTimeout(() => {
        $(".container_payment").show(500).fadeIn();
      }, 500);
    })
    .catch(function () {
      alert("Unexpected error");
      $('#checkout-btn').attr("disabled", false);
    });
});

function createCheckoutButton(preferenceId) {
  // Initialize the checkout
  const bricksBuilder = mercadopago.bricks();

  const renderComponent = async (bricksBuilder) => {
    if (window.checkoutButton) window.checkoutButton.unmount();
    await bricksBuilder.create(
      'wallet',
      'button-checkout', // class/id where the payment button will be displayed
      {
        initialization: {
          preferenceId: preferenceId
        },
        callbacks: {
          onError: (error) => console.error(error),
          onReady: () => {}
        }
      }
    );
  };
  window.checkoutButton =  renderComponent(bricksBuilder);
}
