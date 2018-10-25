<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('contact.index'));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog.index'));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $blog)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($blog->title, route('blog.single', $blog->slug));
});

Breadcrumbs::register('galleries', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Gallery', route('gallery.index'));
});

Breadcrumbs::register('gallery', function($breadcrumbs, $album)
{
    $breadcrumbs->parent('galleries');
    $breadcrumbs->push($album->name, route('galleries.single', $album->id));
});

//// Home > Blog > [Category]
//Breadcrumbs::register('category', function($breadcrumbs, $category)
//{
//    $breadcrumbs->parent('blog');
//    $breadcrumbs->push($category->title, route('category', $category->id));
//});
