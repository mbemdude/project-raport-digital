<?php 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case '';
        case 'home':
            file_exists('pages/home.php') ? include 'pages/home.php' : include 'pages/404.php';
            break;
        case 'santriread':
            file_exists('pages/admin/santriread.php') ? include 'pages/admin/santriread.php' : include "pages/404.php";
            break;
        case 'santricreate':
            file_exists('pages/admin/santricreate.php') ? include 'pages/admin/santricreate.php' : include "pages/404.php";
            break;
        case 'santriupdate':
            file_exists('pages/admin/santriupdate.php') ? include 'pages/admin/santriupdate.php' : include "pages/404.php";
            break;
        case 'santridelete':
            file_exists('pages/admin/santridelete.php') ? include 'pages/admin/santridelete.php' : include "pages/404.php";
            break;
        case 'jabatanread':
            file_exists('pages/admin/jabatanread.php') ? include 'pages/admin/jabatanread.php' : include "pages/404.php";
            break;
        case 'jabatancreate':
            file_exists('pages/admin/jabatancreate.php') ? include 'pages/admin/jabatancreate.php' : include "pages/404.php";
            break;
        case 'jabatanupdate':
            file_exists('pages/admin/jabatanupdate.php') ? include 'pages/admin/jabatanupdate.php' : include "pages/404.php";
            break;
        case 'jabatandelete':
            file_exists('pages/admin/jabatandelete.php') ? include 'pages/admin/jabatandelete.php' : include "pages/404.php";
            break;
        default:
            include 'pages/404.php';
    }
} else {
    include 'pages/home.php';
}

?>