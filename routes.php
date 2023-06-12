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
        case 'gururead':
            file_exists('pages/admin/gururead.php') ? include 'pages/admin/gururead.php' : include "pages/404.php";
            break;
        case 'gurucreate':
            file_exists('pages/admin/gurucreate.php') ? include 'pages/admin/gurucreate.php' : include "pages/404.php";
            break;
        case 'guruupdate':
            file_exists('pages/admin/guruupdate.php') ? include 'pages/admin/guruupdate.php' : include "pages/404.php";
            break;
        case 'gurudelete':
            file_exists('pages/admin/gurudelete.php') ? include 'pages/admin/gurudelete.php' : include "pages/404.php";
            break;
        case 'mapelread':
            file_exists('pages/admin/mapelread.php') ? include 'pages/admin/mapelread.php' : include "pages/404.php";
            break;
        case 'mapelcreate':
            file_exists('pages/admin/mapelcreate.php') ? include 'pages/admin/mapelcreate.php' : include "pages/404.php";
            break;
        case 'mapelupdate':
            file_exists('pages/admin/mapelupdate.php') ? include 'pages/admin/mapelupdate.php' : include "pages/404.php";
            break;
        case 'mapeldelete':
            file_exists('pages/admin/mapeldelete.php') ? include 'pages/admin/mapeldelete.php' : include "pages/404.php";
            break;
        default:
            include 'pages/404.php';
    }
} else {
    include 'pages/home.php';
}

?>