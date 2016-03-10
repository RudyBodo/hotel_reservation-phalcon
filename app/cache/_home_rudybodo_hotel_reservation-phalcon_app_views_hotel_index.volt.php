<p><h1>List Hotel</h1></p>

<?php foreach ($hotel as $hotels) { ?>
    <ul>
        <li><?php echo $this->tag->linkTo(array('hotel/detail/' . $hotels->id, $hotels->name)); ?></li>
    </ul>
<?php } ?>



