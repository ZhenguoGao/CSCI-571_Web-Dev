<html>
    <head>
        <title>PHP TEST</title>
        <meta http-equiv="Content-Type>" content="text/html"; charset="ISO-8859-1">
    </head>
        <h1>PHP Test</h1>
        <p>
        <b>An Example of PHP in Action</b><be />
        <?php data_default_timezone_set('America/Los_ANgeles');?>
            <?php echo "The Current Date and Time is : <br>";
            echo date("g:i A l, F j Y.");?>
        </p>
        <h2>PHP Information</h2>
        <p>
            <?php phpinfo(); ?>
        </p>
</html>