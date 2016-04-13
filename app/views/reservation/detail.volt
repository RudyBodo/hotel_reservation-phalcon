<h1>Detail Reservaton</h1>

<table class="table">
    <thead>
        <th>Reservation Code</th>
        <th>Hotel</th>
        <th>Room</th>
        <th>Price</th>
        <th>Night</th>
        <th>Adult</th>
    </thead>

    <tbody>
        <td>{{data.reservation_code}}</td>
        <td>{{data.hotels.name}}</td>
        <td>{{data.room}}</td>
        <td>Rp. {{price.total_price}}</td>
        <td>{{data.night}}</td>
        <td>{{data.adult}}</td>
    </tbody>
</table>
