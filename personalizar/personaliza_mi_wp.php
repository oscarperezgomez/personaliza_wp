<?php

/*****************************************************************************************************

Plugin Name: Personaliza tu WordPress
Description: En este plugin pondremos las funciones para personalizar nuestra instalación de WordPeess
Plugin URI: 
Version: 1.0
License: GPL
Author: WordPress Collado Villalba
Author URI: https://wpcolladovillalba.org/

*****************************************************************************************************/
// Pegar a partir de aquí las funciones y código que queramos añadir.

	//DESACTIVAR GUTEMBERG
	add_filter('use_block_editor_for_post_type', '__return_false', 100);


	//Quitar cajas del escritorio
	//https://ayudawp.com/quitar-cajas-del-escritorio-de-wordpress/
	function quita_cajas_escritorio() {
		//remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Ahora mismo
	  //remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Comentarios recientes
	  //remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Enlaces entrantes
	  //remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
	  //remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Borradores recientes
	  
	  //remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Publicación/Borrador rápido
	  remove_meta_box('dashboard_primary', 'dashboard', 'side');   // Noticas del blog de WordPress
	  remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Otras noticias de WordPress
		remove_action( 'welcome_panel', 'wp_welcome_panel' ); //Quitar el panel de bienvenida de WorPress en el panel de administracion
	} 
	add_action('wp_dashboard_setup', 'quita_cajas_escritorio' );


	/////////////////////////////////////////////////////////////////////
	// MODIFICACIONES PARA LA PAGINA DE LOGIN DEL PANEL DE ADMINISTRACION
	/////////////////////////////////////////////////////////////////////

	//cambiar el mensaje de error en el login del panel de adminsitración
	function mensaje_de_error_en_el_login() {
		return ' ¡Soy siervo del Fuego Secreto, administrador de la llama de Anor! ¡Tu Fuego Oscuro es en vano! ¡Llama de Udûn! ¡Vuelve a la Sombra! ¡NO... PUEDES... PASAR! ';
	}
	add_filter('login_errors', 'mensaje_de_error_en_el_login');


	function el_titulo_de_la_url_del_logo_de_wpadmin() {
	  return 'Página de administración WordPress Collado Villalba';
	}//end my_login_logo_url_title()
	add_filter( 'login_headertitle', 'el_titulo_de_la_url_del_logo_de_wpadmin' );


	//cambiar el enlace del logo de la página de login de WordPress	
	function la_url_del_logo_de_wpadmin() {
	  return home_url();
	}//end my_login_logo_url()
	add_filter( 'login_headerurl', 'la_url_del_logo_de_wpadmin' );


	// Personalizar el look del login del panel de control
	// Añadimos nuestro fichero css a la página del login
	function el_login_de_wpadmin() { 
		wp_register_style('mi_login', WP_PLUGIN_URL.'/personalizar/assets/mi_login.css');
		wp_enqueue_style('mi_login');
	}
	add_action( 'login_enqueue_scripts', 'el_login_de_wpadmin' );


	//Eliminamos el icono de WordPress que se muestra en la esquina superior izquierda del panel de administración
	// Añadimos nuestro fichero css al panel de administración

	function modificar_CSS() {
		wp_register_style('mi_css', WP_PLUGIN_URL.'/personalizar/assets/mi_css.css');
		wp_enqueue_style('mi_css');
	}
	add_action('admin_print_styles', 'modificar_CSS');
























/*










	// Eliminar la basura de la etiqueta <head> 
	remove_action('wp_head', 'wp_generator'); 
	remove_action('wp_head', 'rsd_link'); 
	remove_action('wp_head', 'wlwmanifest_link'); 
	remove_action('wp_head', 'index_rel_link'); 
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); 
	remove_action('wp_head', 'start_post_rel_link', 10, 0); 
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


*/
?>