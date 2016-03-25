<div class="page-header">
    <nav class="navbar navbar-default">
        <div class="navbar-inner"></div>
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="/hotel"><span class="fa fa-home"></span>Home</a></li>
                <li><a href="#"><span class="fa fa-connectdevelop"></span>Contact</a></li>
                <li><a href="#"><span class="fa fa-hotel"></span>About</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="session/login"><span class="fa fa-sign-in"></span>Login</a></li>
            </ul>
        </div>
    </nav>
</div>

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
            <?php if ($this->session->has('auth-admin')) { ?>
                <?php echo $this->tag->linkTo(array('hotel/detail/' . $hotels->id, 'Detail')); ?> |
                <?php echo $this->tag->linkTo(array('/hotel/edit/' . $hotels->id, 'Edit')); ?> |
                <?php echo $this->tag->linkTo(array('/hotel/delete/' . $hotels->id, 'Delete')); ?>
            <?php } else { ?>
            <?php echo $this->tag->linkTo(array('hotel/detail/' . $hotels->id, 'Detail')); ?>
            <?php } ?>
        </td>
    </tbody>
    <?php } ?>
</table>


