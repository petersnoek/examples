<?php

    // what does this file do?
    // 1: is a post received? - if no, show error and login form
    // 2: is the user input valid and complete? - if no, show error and login form
    // 3: check if the user/pass combination exist in the database - if no, show error and login form
    // - if yes, then remember username in session and proceed to next page (index.php)


    // 1
    if ( ! isset($_POST['submit']))
    {
        // no submit, so just show the login form
        ShowForm();
        exit;
    }

    // 2
    $errmsg = '';
    if ( ! isset($_POST['email'])  )
    {
        $errmsg .= 'Please fill in your e-mail address.<br />';
    }
    if ( ! isset($_POST['password'])  )
    {
        $errmsg .= 'Please fill in your password.<br />';
    }
    if ( ! isset($_POST['firstname'])  )
    {
        $errmsg .= 'Please fill in your first name.<br />';
    }
    if ( $errmsg != '')
    {
        ShowForm($errmsg, 'ERROR');
        exit;
    }


function ShowForm($message = null, $msgtype = '')
{
    require 'inc/_header.tpl.html';

    //$message = 'lekker fout 2';
    if ( $message != '' ) require 'inc/_alert_error.tpl.php';

    var_dump($_POST);

    require 'inc/loginform.inc.php';

    require 'inc/_footer.tpl.php';
}