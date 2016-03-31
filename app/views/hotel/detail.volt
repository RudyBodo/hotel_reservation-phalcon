<h1>{{ detail.name }}</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Province</th>
        <th>Country</th>
    </tr>
    </thead>

    <tbody>
    <td>{{ detail.name }}</td>
    <td>{{ detail.address }}</td>
    <td>{{ detail.city.city }}</td>
    <td>{{ detail.province.province }}</td>
    <td>{{ detail.country.country }}</td>
     </tbody>
</table>

<br>
<h1>Room</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>

    </tr>
    </thead>
    {% for rooms in room %}
    <tbody>
    <td>{{ rooms.room.room }}</td>
    <td>Rp. {{ rooms.price }}</td>
    <td>{{ link_to('/reservation/add/' ~ detail.id, 'Pesan') }}</td>
    {% endfor %}
    </tbody>
</table>

<br>
<h1>Facility</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    </thead>
    {% for hotelsfacility in facility %}
    <tbody>
    <td>{{ hotelsfacility.facility.name }}</td>
    <td>{{ hotelsfacility.amount }}</td>
    </tbody>
    {% endfor %}
</table>
