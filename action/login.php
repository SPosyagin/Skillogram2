<?php

require('html/login_form.html');

$user = new User;
$user->authorize();
            
