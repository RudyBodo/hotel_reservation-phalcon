<h1>Registration</h1>

{% if msg %}
<div class="alert alert-success">
    <strong>Success!</strong>{{ msg }} Please <a href="session/login">Login</a>
</div>
{% endif %}
<form class="horizontal" method="post">

    <div class="form-group">
        {{ form.label('username') }}
        {{ form.render('username',["class" : "form-control"]) }}
        {{ form.messages('username') }}
    </div>

    <div class="form-group">
        {{ form.label('password') }}
        {{ form.render('password', ["class" : "form-control"]) }}
        {{ form.messages('password') }}
    </div>

    <div class="form-group">
        {{ form.label('confirmPassword') }}
        {{ form.render('confirmPassword', ["class" : "form-control"]) }}
        {{ form.messages('confirmPassword') }}
    </div>

    <div class="form-group">
            {{ form.label('fullname') }}
            {{ form.render('fullname', ["class" : "form-control"]) }}
            {{ form.messages('fullname') }}
    </div>

    <div class="form-group">
        {{ form.label('email') }}
        {{ form.render('email', ["class" : "form-control"]) }}
        {{ form.messages('email') }}
    </div>

    <div class="form-group">
        {{ form.label('address') }}
        {{ form.render('address', ["class" : "form-control"]) }}
        {{ form.messages('address') }}
    </div>

    <div class="form-group">
        {{ form.label('phone_number') }}
        {{ form.render('phone_number', ["class" : "form-control"]) }}
        {{ form.messages('phone_number') }}
    </div>

    <button type="submit" class="btn btn-success">Add</button>


</form>