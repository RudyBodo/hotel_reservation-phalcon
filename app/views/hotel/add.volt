<h1>Hotels Data</h1>
{% if msg %}
<div class="alert alert-success">
    <strong>Success!!</strong> {{ msg }}
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
        <label>Facility</label>
        {{ form.render('facility_id', ["class" : "form-control"]) }}
        {{ form.messages('facility_id') }}
        </select>
    </div>

    <div class="form-group">
        {{ form.render('amount', ["class" : "form-control"]) }}
        {{ form.messages('amount') }}
    </div>

    <div class="form-group">
        <label>Facility</label>
        {{ form.render('facility_id', ["class" : "form-control"]) }}
        {{ form.messages('facility_id') }}
        </select>
    </div>

    <div class="form-group">
        {{ form.render('amount', ["class" : "form-control"]) }}
        {{ form.messages('amount') }}
    </div>

    <button type="submit" class="btn btn-primary" value="add">Add</button>

</form>
