<p><h1>List Hotel</h1></p>

<p><a href="/hotel/add">Add Entry</a></p>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <?php foreach ($hotel as $hotels) { ?>
    <tbody>
        <td><?php echo $hotels->name; ?></td>
        <td>
            <?php echo $this->tag->linkTo(array('hotel/detail/' . $hotels->id, 'Detail')); ?> |
            <?php echo $this->tag->linkTo(array('/hotel/edit/' . $hotels->id, 'Edit')); ?> |
            <?php echo $this->tag->linkTo(array('/hotel/addfacility/' . $hotels->id, 'Facility')); ?> |
            <?php echo $this->tag->linkTo(array('/hotel/delete/' . $hotels->id, 'Delete')); ?>
        </td>
    </tbody>
    <?php } ?>
</table>


