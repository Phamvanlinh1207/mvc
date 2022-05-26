<?php
function url($page) {
    return 'index.php?controller=homeController&page=' . $page;
}

function url_pattern($controller, $page, $id) {
    return sprintf("index.php?controller=%s&page=%s&id=%s", $controller, $page, $id);
}
?>