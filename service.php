<?php

if ($_GET['hub.verify_token']=='thanhnv'){
    echo $_GET['hub.challenge'];
}else{
    echo 'error';
}