<?php

	class Model {

		protected static function Select( $conn, $tbl, $fields, $class ) {
			$prm = '';
			for( $i = 0; $i < count( $fields ); $i++ ) {
				$prm = $prm . (empty( $prm ) ? '' : ',') . '$r[' . $i . ']';
			}
			$eval = '$obj=new ' . "$class($prm);";

			$q	 = "Select " . implode( ',', $fields ) . " From $tbl";
			$res = $conn->query( $q );
			$ret = array();
			while( $r	 = $res->fetch_row() ) {
				$obj			 = NULL;
				eval( $eval );
				$ret[ $r[ 0 ] ]	 = $obj;
			}
			return $ret;
		}

	}
