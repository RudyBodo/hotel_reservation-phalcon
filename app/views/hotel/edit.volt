<h1>Edit Hotel</h1>

<form method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="text">
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" id="text">
    </div>

    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" name="zipcode" class="form-control" id="zipcode">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price">
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <select name="city" class="form-control" id="city">
            {% for c in city %}
            <option value="{{c.id}}">{{ c.city }}</option>
            {% endfor %}
        </select>
    </div>

    <div class="form-group">
        <label for="province">Province</label>
        <select name="province" class="form-control" id="provincey">
            {% for p in provinces %}
            <option value="{{p.id}}">{{ p.province }}</option>
            {% endfor %}
        </select>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <select name="country" class="form-control" id="country">
            {% for n in country %}
            <option value="{{ n.id }}">{{ n.country }}</option>
            {% endfor %}
        </select>
    </div>

    <button type="submit" class="btn btn-default" value="add">Edit</button>

</form>
