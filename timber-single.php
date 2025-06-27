<?php
get_header();

use Timber\Timber;

$context = Timber::context();
$post = Timber::get_post(); // get the current post

$context['post'] = $post;
$context['sidebar'] = Timber::get_widgets('sidebar-1');

Timber::render('single.twig', $context);

get_footer();
