<?php

class CategoryHandeller extends DBHandeller {

    var $table = "category";
    var $resultSet = "Category";

    function __construct() {
        parent::__construct();
    }
}
