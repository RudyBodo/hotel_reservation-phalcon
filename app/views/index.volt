<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Hotel Reservation</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/datepicker.css">
        <link rel="stylesheet" href="/fonts/css/font-awesome.css">

    </head>
    <body>
        <div class="container">
            {{ content() }}
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/js/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/bootstrap-datepicker.js"></script>
        <script src="/js/moment.js"></script>
        <script type="text/javascript">
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#dpd1').datepicker({
              onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
              }
              checkin.hide();
              $('#dpd2')[0].focus();
            }).data('datepicker');
            var checkout = $('#dpd2').datepicker({
              onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              checkout.hide();
            }).data('datepicker');
        </script>
    </body>
</html>
