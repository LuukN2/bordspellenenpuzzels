<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
     $breadcrumbs->push('Home', route('home'));
});

// Home -> Boardgames
Breadcrumbs::register('bordspellen', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bordspellen', route('boardgames'));
});

// Home -> Puzzles
Breadcrumbs::register('puzzels', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Puzzels', route('puzzles'));
});

// Home -> Admin
Breadcrumbs::register('admin', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Admin', route('admin'));
});

// home -> Products
Breadcrumbs::register('products', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Beheer Producten', route('products'));
});

// etc
Breadcrumbs::register('edit_product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('products');
    $breadcrumbs->push($product->name, route('edit_product', $product->id));
});

Breadcrumbs::register('new_product', function ($breadcrumbs) {
    $breadcrumbs->parent('products');
    $breadcrumbs->push('Nieuw Product', route('new_product'));
});

Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Beheer Categoriën', route('categories'));
});

Breadcrumbs::register('edit_category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push($category->name, route('edit_category', $category->id));
});

Breadcrumbs::register('new_category', function ($breadcrumbs) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Nieuwe Category', route('new_category'));
});

Breadcrumbs::register('orders', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Beheer Orders', route('orders'));
});

Breadcrumbs::register('show_order', function ($breadcrumbs) {
    $breadcrumbs->parent('orders');
    $breadcrumbs->push('Bekijk Order', route('show_order'));
});

Breadcrumbs::register('cart', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Winkelwagen', route('cart'));
});
?>

