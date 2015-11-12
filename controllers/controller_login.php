<?php

	require_once 'controller.php';

	class ControllerLogin extends Controller {

		public function Index( $params ) {
			if( isset( $params[ 'login' ] ) ) {
				$_SESSION[ 'user' ] = $params['login'];
			}
			else {
				unset( $_SESSION[ 'user' ] );
			}
	//		header( 'Location: ' . (isset( $params[ 'uri' ] ) ? $params[ 'uri' ] : '/'),
	//							  TRUE, 307 );
	//TODO 	Проверка логина
				echo 'Проверка логина:'.$params['login'].'__'.$params['pswd'].'<br>(ControllerLogin)';
		}

	}
