<h1>Reservation</h1>

<table class="table">
    {% if id %}
    <th>Reservation Code</th>
    <th>Hotel</th>
    <th>Room</th>
    <th>Room Number</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>Action</th>
    <th>Amount</th>
    <thead>
    {% else %}

    <th>Reservation Code</th>
    <th>Hotel</th>
    <th>Room</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>Action</th>
    </thead>
    {% endif %}

    {% if id %}
    <tbody>
    <td>{{data.reservation_code}}</td>
    <td>{{data.hotels.name}}</td>
    <td>{{data.room}}</td>
    <td>{{data.checkin_date}}</td>
    <td>{{data.checkout_date}}</td>
    <td>{{ link_to('/Confirmation/' ~ data.id, 'Confirmation') }}</td>
    </tbody>
    {% else %}

    {% for reserv in data %}
    <tbody>
    <td>{{reserv.reservation_code}}</td>
    <td>{{reserv.hotels.name}}</td>
    <td>{{reserv.room}}</td>
    <td>{{reserv.checkin_date}}</td>
    <td>{{reserv.checkout_date}}</td>
    <td>{{ link_to('/reservation/' ~ reserv.id, 'Detail') }}</td>
    </tbody>
    {% endfor %}

    {% endif %}
</table>