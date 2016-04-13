<h1>Hotels Data</h1>
{% if msg %}
<div class="alert alert-success">
    <strong>Success!!</strong> {{ msg }}
</div>
{% endif %}


{% if err_save %}
<div class="alert alert-danger">
    {% for err in err_save %}
    <strong>Error!!</strong> {{ err }}
    {% endfor %}
</div>
{% endif %}

{% if error %}
<div class="alert alert-danger">
    <strong>Error!!</strong> {{ error }}
</div>
{% endif %}

<form class="form-horizontal" method="post">

    <div class="form-group">
        {{ form.label('name') }}
        {{ form.render('name', ["class" : "form-control"]) }}
        {{ form.messages('name') }}
    </div>

    <div class="form-group">
        {{ form.label('address') }}
        {{ form.render('address', ["class" : "form-control"]) }}
        {{ form.messages('address') }}
    </div>

    <div class="form-group">
        {{ form.label('zipcode') }}
        {{ form.render('zipcode', ["class" : "form-control"]) }}
        {{ form.messages('zipcode') }}
    </div>

    <div class="form-group">
        {{ form.label('city') }}
        {{ form.render('city', ["class" : "form-control"]) }}
        {{ form.messages('city') }}
    </div>

    <div class="form-group">
        {{ form.label('province') }}
        {{ form.render('province', ["class" : "form-control"]) }}
        {{ form.messages('province') }}
    </div>

    <div class="form-group">
        {{ form.label('country') }}
        {{ form.render('country', ["class" : "form-control"]) }}
        {{ form.messages('country') }}
    </div>

    <div class="align -align-left">
        <h2>Hotels Facility</h2>
    </div>

    <div class="form-group">
        <label>Garage</label>
        <select name="facility_id[]" class="form-control">
            {% for a in facility %}
            <option value="{{a.id}}">{{a.name}}</option>
            {% endfor %}
        </select>
    </div>

    <div class="form-group">
        {{ form.render('amount[]', ["class" : "form-control"]) }}
        {{ form.messages('amount[]') }}
    </div>

    <div class="form-group">
        <label>Waterpool</label>
        <select name="facility_id[]" class="form-control">
            {% for a in facility %}
            <option value="{{a.id}}">{{a.name}}</option>
            {% endfor %}
        </select>
    </div>

    <div class="form-group">
        {{ form.render('amount[]', ["class" : "form-control"]) }}
        {{ form.messages('amount[]') }}
    </div>

    <div class="form-group">
        <label>Lounge</label>
        <select name="facility_id[]" class="form-control">
            {% for a in facility %}
            <option value="{{a.id}}">{{a.name}}</option>
            {% endfor %}
        </select>
    </div>

    <div class="form-group">
        {{ form.render('amount[]', ["class" : "form-control"]) }}
        {{ form.messages('amount[]') }}
    </div>

    <h2>Room</h2>

    <div class="form-group">
        <label>First Room</label>
        {{ form.render('room[]',["class" : "form-control"]) }}
        {{ form.messages('room[]') }}
    </div>

    <div class="form-group">
        {{ form.render('price[]', ["class" : "form-control"]) }}
        {{ form.messages('price[]') }}
    </div>

    <div class="form-group">
        <label>Second Room</label>
        {{ form.render('room[]',["class" : "form-control"]) }}
        {{ form.messages('room[]') }}
    </div>

    <div class="form-group">
        {{ form.render('price[]', ["class" : "form-control"]) }}
        {{ form.messages('price[]') }}
    </div>

    <div class="form-group">
        <label>Other Room</label>
        {{ form.render('room[]',["class" : "form-control"]) }}
        {{ form.messages('room[]') }}
    </div>

    <div class="form-group">
        {{ form.render('price[]', ["class" : "form-control"]) }}
        {{ form.messages('price[]') }}
    </div>

    <button type="submit" class="btn btn-primary" value="add">Add</button>

</form>
