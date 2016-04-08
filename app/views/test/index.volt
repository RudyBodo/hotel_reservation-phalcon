<div class="container" align="center">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-md-offset-4">
            <div class="login-box well">
                <i class="fa fa-shopping-cart fa-4x"></i>
                <h2>Pesan</h2>
                <form method="post">
                    <label>Check In</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {{ form.render('checkin', ["class" : "form-control", "id" : "dpd1"]) }}
                    </div>

                    <br>

                    <label>Check Out</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {{ form.render('checkout', ["class" : "form-control", "id" : "dpd2"]) }}
                    </div>
                    {{ form.messages('checkout') }}
                    <br>

                    <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Order</button>

                </form>
            </div>
        </div>
    </div>
</div>
