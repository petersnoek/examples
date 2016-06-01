<html>
<body>
    <h1>Hallo</h1>

    <?php
        // inline code
        date_default_timezone_set('Europe/Amsterdam');
        $d = new DateTime();
        echo $d->format('d-m-Y') . '<br>';

        // apart include file met functies
        include 'functions.php';
        PrintDate();

        // gebruik een zelfgemaakt object
        include 'object.php';
        $t = new Time();
        $t->lastvisit = new DateTime('yesterday');
        echo $t->GetCurrentTime();
        echo $t->GetLastVisit();



    ?>

</body>
</html>