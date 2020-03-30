<!DOCTYPE html>
<html>
<head>
	<title>IslandOfLoves</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<center>
	<div class="card" style="width: 18rem;margin-left: 15%">
	  <img src="{{ url('/images/iolmois.png/' )}}" class="card-img-top" alt="...">
	  <div class="card-body">
		<form action="">
		  <div class="form-group">
		    <label for="amound">Amound</label>
		    <input type="text" class="form-control" id="amound" aria-describedby="amountHelp" name="amount" placeholder="entrer votre compte">
            <small id="emailHelp" class="form-text text-muted">Vos informations sont en securité.</small>

          <div id="form-footer">
            <script src="https://www.paypal.com/sdk/js?client-id=ARcLURdx4DRfJXoJImggjQIOA6vEyptTlbyQBwiTRH6EISwQIN46YIevn4PfJWGswrPavZdGkZivGRhz"></script>
            <script>paypal.Buttons({
                createOrder: function(data, actions) {
                  // This function sets up the details of the transaction, including the amount and line item details.
                  return actions.order.create({
                    purchase_units: [{
                      reference_id : 'PU1',
                      description : 'Abonnement for IOL medium',
                      invoice_id : 'ab-iol-12',
                      custom_id : 'CUST-IOL',
                      amount: {
                        currency_code : 'USD',
                        value: '50'
                      }

                    }]
                  });
                },
                onApprove: function(data, actions) {
                  // This function captures the funds from the transaction.
                  return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    if(details.status == "COMPLETED"){

                        $.ajax({
                            url: 'payment/'+details,
                            type: 'get',
                            success: function (data) {
                                alert(' Transaction Successfull');
                            },
                            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                                /*console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
                            }
                        });
                    }else{
                        alert('Failed Transaction!!! Please try again ' );

                    }

                  });
                }
              }).render('#form-footer');</script>
          </div>
		</form>
	  </div>
	</div>
</center>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
