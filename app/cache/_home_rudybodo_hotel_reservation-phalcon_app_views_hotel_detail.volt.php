<h1><?php echo $detail->name; ?></h1>

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
<h1>Room</h1>

<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>

    </tr>
    </thead>
    <?php foreach ($room as $rooms) { ?>
    <tbody>
    <td><?php echo $rooms->room->room; ?></td>
    <td>Rp. <?php echo $rooms->price; ?></td>
    <td><?php echo $this->tag->linkTo(array('/reservation/add/' . $detail->id, 'Pesan')); ?></td>
    <?php } ?>
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
    <?php foreach ($facility as $hotelsfacility) { ?>
    <tbody>
    <td><?php echo $hotelsfacility->facility->name; ?></td>
    <td><?php echo $hotelsfacility->value; ?></td>
    </tbody>
    <?php } ?>
</table>
