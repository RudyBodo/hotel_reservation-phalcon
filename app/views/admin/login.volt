<br>
<br>
<br>
<div class="container" align="center">
    <div class="row">
        <div class="col-sm-12 col-md-4 col-md-offset-4">
            <div class="login-box well">
                <i class="fa fa-user-secret fa-4x"></i>
                <h2>Login</h2>
                {% if error %}
                <div class="alert alert-danger">
                    <strong>Error!! </strong>{{ error }}
                </div>
                {% endif %}
                <form method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {{ form.render('username',["class" : "form-control"]) }}
                    </div>
                    {{ form.messages('username') }}

                    <br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {{ form.render('password',["class" : "form-control"]) }}
                    </div>
                    {{ form.messages('password') }}

                    <br>
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i>Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

