<?php 
    include_once "../../functions/middleware.php";
    
    $pageTitle = "Register an account";
    $formMethod = "post";
    $formAction = "register";
    $formHtml = '
        <label>Enter your first name</label>
        <input class="form-control" name="firstname" placeholder="eg.. John"/>
        <label>Enter your last name</label>
        <input class="form-control" name="lastname" placeholder="eg.. Doe"/>
        <label>Enter your email address</label>
        <input class="form-control" name="email" placeholder="eg.. somemail@somedomain.com"/>
        <label>Create a password</label>
        <input class="form-control" name="password" type="password" placeholder="eg.. *******"/>
    ';
    
    include $GLOBALS["project_root"]."components/loggedoutforms.php";
?>