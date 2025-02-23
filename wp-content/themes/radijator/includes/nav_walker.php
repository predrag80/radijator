<?php 

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        /*$class_names = join(' ', apply_filters('main-nav__item', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';*/

        $regular_state = get_field('regular_state', $item->ID)['url'];
        $hover_state = get_field('hover_state', $item->ID)['url'];

        $output .= '<li class="main-nav__item">';

       
        // Start the link
        $output .= '<a class="main-nav__link" href="' . esc_url($item->url) . '">';

        // Add image if available
        if ($regular_state) {
            $output .= '<img src="' . $regular_state  . '" alt="' . esc_attr($item->title) . '" class="menu-icon"> ';
        }

        if ($hover_state) {
            $output .= '<img src="' . $hover_state  . '" alt="' . esc_attr($item->title) . '" class="menu-icon-hover"> ';
        }

        // Menu item title
        $output .= esc_html($item->title);
        $output .= '</a>';

        $output .= '</li>';
    }
}
