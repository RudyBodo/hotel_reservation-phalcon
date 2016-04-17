<h1>Reservation</h1>

{% if msg %}

<div class="alert alert-danger">
    <strong>Error!!</strong> {{ msg }}
</div>
{% endif %}
<table class="table">
    <thead>
        <th>Reservation Code</th>
        <th>Hotel</th>
        <th>Room</th>
        <th>Action</th>
    </thead>
    {% for reserv in data %}
    <tbody>
    <td>{{reserv.reservation_code}}</td>
    <td>{{reserv.hotels.name}}</td>
    <td>{{reserv.room}}</td>
    <td>{{ link_to('/reservation/detail/' ~ reserv.id, 'Detail') }}</td>
    </tbody>
    {% endfor %}
</table>
