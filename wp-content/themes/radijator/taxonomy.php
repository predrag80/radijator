<?php 

/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */

$quote             = !empty(get_field( 'quote' )) ? get_field( 'quote' ) : 'Your quote here...';
$author            = get_field( 'author' );

if ( $author ) {
    echo '<h2>' . $quote . '</h2>';
    echo '<p>' . $author . '</p>';
}