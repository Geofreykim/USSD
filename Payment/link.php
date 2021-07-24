<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>


</head>
<body>
<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <button type="button" onClick="makePayment()">Pay Now</button>
</form>

<script>
  function makePayment() {
    FlutterwaveCheckout({
      public_key: "FLWPUBK-330050d29e91461f1ad55de39e80b84e-X",
      tx_ref: "RX1",
      amount: 500,
      currency: "UGX",
      country: "UG",
      payment_options: " ",
      redirect_url: // specified redirect URL
        //"https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
        "http://localhost/internship/Payment/tt.php",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "geofkim98@gmail.com",
        phone_number: "0757252576",
        name: "Flutterwave Developers",
      },
      callback: function (data) {
        console.log(data);
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "My store",
        description: "Payment for charity tickets",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });
  }
</script>


</body>
</html>