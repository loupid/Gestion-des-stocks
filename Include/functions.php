<?php

function redirect($e){
    header("Location: ". $_SERVER['REQUEST_SCHEME'].$e);
}