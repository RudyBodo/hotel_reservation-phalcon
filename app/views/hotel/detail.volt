<h1>Detail Hotel</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Province</th>
        <th>Country</th>
        <th>Garage</th>
        <th>Carports</th>
        <th>Swimming Pool</th>
    </tr>
    </thead>

    <tbody>
    <td>{{ detail.name }}</td>
    <td>{{ detail.address }}</td>
    <td>{{ detail.city.city }}</td>
    <td>{{ detail.province.province }}</td>
    <td>{{ detail.country.country }}</td>
    <td>{{ facility.garage }}</td>
    <td>{{ facility.carports }}</td>
    <td>{{ facility.swimmingpool }}</td>
    </tbody>
</table>
