<?php 
session_start();

 echo $_SESSION['amount'];
?>
<!DOCTYPE html> 
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div id="amount" data-amount="<?php echo $_SESSION['amount']?>"></div>

<form action="card.php" method="POST" id="Form">

<input type="hidden" name="paypal">


</form>






  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=Aari80YGRAX7Q3qd-zXhxFaTzLzZz5xdyJKArAzCT69MuTA4-X06zM6Pzw2PKO2e1KqYqRWXQAErrNqV&currency=USD"></script>
  <!-- Set up a container element for the button -->
  <div id="paypal-button-container"></div>
  <script>
    let amount=document.querySelector("#amount").dataset.amount; 
    console.log(amount);
    let amountdollar=amount/10.79; 
    console.log(amountdollar);
    console.log(Math.floor(amountdollar).toString());

    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: Math.floor(amountdollar).toString()// Can also reference a variable or function
              }  
            }]    
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
           // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
  //window.location.href="paiement succs.php?ko=salma";
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
              document.getElementById('Form').submit();
          });
        }
      }).render('#paypal-button-container');
    </script>
  </body>
  </html>
 