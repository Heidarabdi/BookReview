<?php

// generate id in form number between 6 digits

function generateId()
{
    $id = rand(100000, 999999);
    return $id;
}
