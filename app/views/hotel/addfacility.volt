<h2>Facility {{hotel.name}}</h2>

<form method="post">

    <div class="form-group">
        <label for="facility">Facility Name</label>
        <select name="facility" class="form-control" id="facility">
            {% for f in facility %}
            <option value="{{ f.id }}">{{ f.name }}</option>
            {% endfor %}
        </select>
    </div>

    <div class="form-group">
        <label for="value">Value</label>
        <input type="text" name="value" class="form-control" id="value" required>
    </div>

    <button type="submit" class="btn btn-default">Add</button>
</form>
