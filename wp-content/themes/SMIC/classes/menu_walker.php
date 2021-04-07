<?php

class custom_sub_walker extends Walker_Nav_Menu {
    private $curItem;

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        // $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
        // $output .= "\n$indent<div class='dropdown-menu'><div class='submenu-content container'>"."<h3 class='submenu-title col-3'>".$this->curItem->title."</h3>"."<ul role='menu' class='col-7'>\n";
        //print '<pre>';print_r($this->curItem);print'</pre>';
        if($this->curItem->object == 'page') {
            $output .= "\n$indent<div class='dropdown-menu'><div class='submenu-content'>"."<h3 class='submenu-title'><a href='".$this->curItem->url."' class='submenu-title'>".$this->curItem->title."</a></h3>"."<ul role='menu'>\n";
        } else {
            $output .= "\n$indent<div class='dropdown-menu'><div class='submenu-content'>"."<h3 class='submenu-title'>".$this->curItem->title."</h3>"."<ul role='menu'>\n";
        }
        // $output .= '<h3>'.$this->curItem->post_title.'</h3>';
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $this->curItem = $item;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /*grab the default wp nav classes*/
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        /*if the current item has children, append the dropdown class*/
        if ( $args->has_children )
            $class_names .= ' dropdown ';

        /*if there aren't any class names, don't show class attribute*/
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';


        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
        $atts['target'] = ! empty( $item->target )  ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';


        /*if the current menu item has children and it's the parent, set the dropdown attributes*/
        if ( $args->has_children && $depth === 0 ) {
            if(in_array($item->object_id,array(439,446))) {
                $atts['href']           = '#';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }
            $atts['data-toggle']    = 'dropdown';
            $atts['class']          = 'dropdown-toggle';
        } else {
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            $atts['class']          = 'submenu-link';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

        $item_output .= '<a'. $attributes .'>';

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    /*  if the current menu item has children and it's the parent item, append the fa-angle-down icon*/
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }

    
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        if ( is_object( $args[0] ) )
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );


        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}