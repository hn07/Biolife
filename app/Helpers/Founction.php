<?php

use App\Models\Groups;
use App\Models\Categories;

function getAllGroup()
{
    $groups = new Groups();
    return  $groups->getAll();
}

function getAllCategory()
{
    $category = new Categories();
    return  $category->getAll();
}