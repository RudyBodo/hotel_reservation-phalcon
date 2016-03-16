<h1>Add Hotel</h1>

<form class="form-horizontal" method="post">
    <div class="form-group" placeholder="nananana">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Hotel Name" class="form-control" id="text" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Address" class="form-control" id="text" required>
    </div>

    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" placeholder="Zipcode" name="zipcode" class="form-control" id="zipcode" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" placeholder="Price" name="price" class="form-control" id="price" required>
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
        <select name="province" class="form-control" id="province">
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

    <div class="form-group">
        <label for="facility">Facility</label>
        <br>
        {% for f in facility %}
        <input name="facility" type="checkbox" value="{{ f.id }}">{{ f.name }}
        <br>
        {% endfor %}
    </div>

    <button type="submit" class="btn btn-default" value="add">Add</button>

</form>
