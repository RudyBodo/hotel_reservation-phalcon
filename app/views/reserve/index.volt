<br>
<br>
<br>
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
                        <input type="date" class="form-control" name="checkin" placeholder="Check In" required/>
                    </div>

                    <br>

                    <label>Check Out</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" name="checkout" placeholder="Check Out" required/>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <select name="amount" class="form-control" id="adult">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="adult">Adult</label>
                        <select name="adult" class="form-control" id="adult">
                            <option value="1">1 Dewasa</option>
                            <option value="2">2 Dewasa</option>
                            <option value="3">3 Dewasa</option>
                            <option value="4">4 Dewasa</option>
                            <option value="5">5 Dewasa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="night">Night</label>
                        <select name="night" class="form-control" id="adult">
                            <option value="1">1 Malam</option>
                            <option value="2">2 Malam</option>
                            <option value="3">3 Malam</option>
                            <option value="4">4 Malam</option>
                            <option value="5">5 Malam</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="room_number">Room</label>
                        <select name="room" class="form-control" id="adult">
                            {% for rooms in room %}
                            <option value="{{rooms.room.room}}">{{ rooms.room.room }}</option>
                            {% endfor %}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="room_number">Room Number</label>
                        <select name="room_number" class="form-control" id="adult">
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                        </select>
                    </div>

                    <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Order</button>

                </form>
            </div>
        </div>


    </div>

</div>

