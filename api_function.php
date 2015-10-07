<?php

function example($id) {

    $bean = R::findAll('costsheet', 'id = ? ', [$id]);
    
    return json_encode(R::exportAll($bean));
}