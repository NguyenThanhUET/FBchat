<?php

if ($_GET['verify_token']=='thanhnv'){
    echo $_GET['challenge'];
}else{
    echo 'error';
}