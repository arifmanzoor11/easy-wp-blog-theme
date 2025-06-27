<?php
if ( ! class_exists( 'Timber' ) ) {
    return;
}

$context = Timber::context();
Timber::render( 'partials/header.twig', $context );