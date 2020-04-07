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
            <script src="https://www.paypalobjects.com/api/checkout.js"></script>
            <script>
                paypal.Button.render({
                  env: 'production',
                  client: {
                    production: 'AfNPF2gw5-MoRk47F3L26UaBRy1UE9yLAVQ00b6v-yn22sx0G_3ExuI5H3ovoxuk6thjmeasI1T1lMfm'
                  },
                  // Customize button (optional)
                  locale: 'en_US',
                  style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                  },
              
                  // Enable Pay Now checkout flow (optional)
                  commit: true,
                  // Set up a payment
                  payment: function(data, actions) {
                    return actions.payment.create({
                      transactions: [{
                        amount: {
                          total: '0.01',
                          currency: 'USD'
                        }
                      }]
                    });
                  },
                   // Execute the payment
                  onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function() {
                      // Show a confirmation message to the buyer
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
                   window.alert('Thank you for your purchase!');
                    });
                  }
                }, '#form-footer');
                
              </script>
          </div>
         <button class="" id="payWithMonetBil" type="submit">Pay by Mobile Money</button></form>

		</form>
	  </div>
	</div>
</center>



<script src=" {{ url('/js/jquery.min.js') }}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://fr.monetbil.com/widget/v2/monetbil.min.js"></script>
<script type="text/javascript">
    $('#payWithMonetBil').on("click", function(e){
        e.preventDefault();
        $.ajax({
            url: "https://api.monetbil.com/widget/2.1/HtWFxQmxwK0uP1aXASGQSjqjx1vDbAwm",
            type: "post",
            data: {'amount':"200"},
            success: function (data) {
                console.log(data)
                if(data.success){
                    alert(' Transaction Successfull');
                }else{
                    alert('Transaction Failed');
                    console.log(data);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                /*console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);*/
                alert('Echec connection');
            }
        });
    });

</script>
</body>
</html>
