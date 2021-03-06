<?php

	require_once 'model_author.php';
	require_once 'model_category.php';

	class Article {

		private $data;

		public static function Init( $id, $name, $pubdate, $content, $cat,
							   $auth = NULL ) {
			$ret			 = new Article();
			$ret->id		 = $id;
			$ret->name		 = $name;
			$ret->pubdate	 = $pubdate;
			$ret->content	 = $content;
			$ret->category	 = $cat;
			$ret->authors	 = (isset( $auth ) ? array( $auth ) : array());
			return $ret;
		}

		public function __get( $name ) {
			return $this->data[ $name ];
		}

		public function __set( $name, $value ) {

			if( substr( $name, -2 ) == 'id' ) {
				$this->data[ $name ] = ( int ) $value;
			}
			else if( $name == 'pubdate' ) {
				$this->data[ $name ] = date_create( $value );
			}
			else {
				$this->data[ $name ] = $value;
			}
		}

		public static function Find( $conn, $authID = NULL, $catId = NULL ) {
			$q = "Select Articles.ID, Articles.Name, Articles.Content, Articles.PubDate, Authors.ID, Authors.Name, Category.ID, Category.Name" .
					"From Category, Articles" .
					"Left Outer Join ArtAuth On ArtAuth.ID_Article = Articles.ID " .
					"Left Outer Join ArtCat On ArtCat.ID_Article = Articles.ID " .
					"Left Outer Join Authors On Authors.ID = ArtAuth.ID_Author " .
					"Where ArtAuth.ID_Author = Authors.ID and ArtCat.ID_Category = Category.ID";

			if( isset( $authID ) && $authID >= 0 ) {
				$q = $q . " And Authors.ID = $authID";
			}
			if( isset( $catId ) && $catId >= 0 ) {
				$q = $q . " And Category.ID = $catId";
			}

			$res		 = $conn->query( $q );
			$articles	 = array();

			if( $res ) {

				while( $article = $res->fetch_row() ) {

					$auth = NULL;
					if( isset( $article[ 4 ] ) ) {
						$auth = new Author( $article[ 4 ], $article[ 5 ] );
					}
					$id = $article[ 0 ];

					if( isset( $articles[ $id ] ) && isset( $auth ) ) {
						$arr						 = $article[ $id ]->authors;
						$arr[]						 = $auth;
						$articles[ $id ]->authors	 = $arr;
					}
					else {
						$articles[ $id ] = Article::Init( $id, $article[ 1 ], $article[ 2 ],
										$article[ 3 ], $article[ 4 ],
										new Author( $article[ 4 ], $article[ 5 ] ),
					  new Category( $article[ 6 ], $article[ 7 ] ), $auth
						);
					}
				}
				return $articles;
			}
		}

	}
