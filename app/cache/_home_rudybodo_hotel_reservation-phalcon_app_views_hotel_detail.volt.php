<h1>Detail Hotel</h1>

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
    <td><?php echo $detail->name; ?></td>
    <td><?php echo $detail->address; ?></td>
    <td><?php echo $detail->city->city; ?></td>
    <td><?php echo $detail->province->province; ?></td>
    <td><?php echo $detail->country->country; ?></td>
     </tbody>

</table>
<br>
<h1>Facility</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Value</th>

    </tr>
    </thead>

    <?php foreach ($facility as $f) { ?>
    <tbody>
    <td><?php echo $f->facility_id; ?></td>
    <td><?php echo $f->value; ?></td>
    </tbody>
    <?php } ?>

</table>
