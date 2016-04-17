<div class="page-header">
    <nav class="navbar navbar-default">
        <div class="navbar-inner"></div>
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="/user"><span class="fa fa-home"></span>Home</a></li>
                <li><a href="/hotel"><span class="fa fa-shopping-cart"></span>Hotel</a></li>
                <li><a href="/reservation"><span class="fa fa-shopping-bag"></span>Resevation</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="session/logout"><span class="fa fa-sign-out"></span>Logout</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="jumbotron">
    <div class="container">
        <p>Welcome {{ user }}</p>
    </div>
</div>
