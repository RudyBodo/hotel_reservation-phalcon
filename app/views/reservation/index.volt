<h1>Reservation</h1>

<table class="table">
    <thead>
    <th>Reservation Code</th>
    <th>Hotel</th>
    <th>Room</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>Action</th>
    </thead>

    {% for reserv in reservation %}
    <tbody>
    <td>{{reserv.reservation_code}}</td>
    <td>{{reserv.hotels.name}}</td>
    <td>{{reserv.room}}</td>
    <td>{{reserv.checkin_date}}</td>
    <td>{{reserv.checkout_date}}</td>
    <td>{{ link_to('/reservation/detail/' ~ reserv.id, 'Detail') }}</td>
    </tbody>
    {% endfor %}
</table>