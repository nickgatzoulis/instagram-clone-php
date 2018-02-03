<?php
if (!isset($_COOKIE['locale'])) {
    setcookie('locale', 'en_UK');
    require_once "{$_SERVER['DOCUMENT_ROOT']}/language/en_UK.php";
} else {
    require_once "{$_SERVER['DOCUMENT_ROOT']}/language/{$_COOKIE['locale']}.php";
}