{% if session.has('auth-admin') %}
<div class="page-header">
    <nav class="navbar navbar-default">
        <div class="navbar-inner"></div>
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="/admin"><span class="fa fa-home"></span>Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hotel
                        <span class="fa fa-hotel"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/hotel">List</a></li>
                        <li><a href="hotel/add">New</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">User
                        <span class="fa fa-user-plus"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="admin/view_user">View</a></li>
                        <li><a href="admin/add">New</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/session/logout"><span class="fa fa-sign-out"></span>Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
{% endif %}

<p><h1>List Hotel</h1></p>
{% if msg %}
<div class="alert alert-success">
    <strong>Success</strong>{{ msg }}
</div>
{% endif %}

{% if error %}
<div class="alert alert-error">
    <strong>Error!!</strong>{{ error }}
</div>
{% endif %}
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    {% for hotels in hotel %}
    <tbody>
        <td>{{ hotels.name }}</td>
        <td>
            {% if session.has('auth-admin') %}
                {{ link_to('hotel/detail/' ~ hotels.id, 'Detail') }} |
                {{ link_to('/hotel/edit/' ~ hotels.id, 'Edit') }} |
                {{ link_to('/hotel/delete/' ~ hotels.id, 'Delete') }}
            {% else %}
            {{ link_to('hotel/detail/' ~ hotels.id, 'Detail') }}
            {% endif %}
        </td>
    </tbody>
    {% endfor %}
</table>
