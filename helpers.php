<?php
function view(string $page, array $data = []) {
    extract($data);
    require 'view/' . $page . '.php';
}