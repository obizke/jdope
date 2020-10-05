
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      </head>
      <body>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><i class="glyphicons glyphicons-globe"></i>Jdope Wear</h2>
                            </div>
                            <div class="col-12">
                                <h5 class="obiz">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 trial">Placed By
                                <address><strong>{{ $order->fname }} {{ $order->lname }}</strong><br>Email: {{ $order->email }}</address>
                            </div>
                            <div class="col-6 trial">Ship To
                                <address><strong>{{ $order->fname }} {{ $order->lname }}</strong><br>{{ $order->location }}<br>{{ $order->phone }}<br></address>
                            </div>
                            <div class="col-4 trials">
                                <b>Order ID:</b> {{ $order->invoice }}<br>
                                <b>Amount:</b> <strong class="text text-danger">ksh.{{ config('settings.currency_symbol') }}{{ round($order->total_amount_due, 2) }}</strong><br>
                                <b>Payment Method:</b> {{ $order->payment_method }}<br>
                                <b>Payment Status:</b> {{ $order->payment_status == 1 ? 'Completed' : 'Not Completed' }}<br>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br>
                        <div class="row mt-5">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>Ksh.{{ config('settings.currency_symbol') }}{{ round($item->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
    </html>

<style> 
 .obiz{
    text-align: right;
 }   
    /* Create three equal columns that floats next to each other */
.trial {
  float: left;
  width: 33.33%;
  padding: 10px;
}
    /* Create three equal columns that floats next to each other */
    .trials {
  float: left;
  width: 25%;
  padding: 10px;
}
</style>
