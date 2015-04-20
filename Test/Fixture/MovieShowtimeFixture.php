<?php
/**
 * MovieShowtimeFixture
 *
 */
class MovieShowtimeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'sala' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'hora' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'idioma' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dia' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'movie_theaters_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'movies_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_movie_showtimes_movie_theaters1_idx' => array('column' => 'movie_theaters_id', 'unique' => 0),
			'fk_movie_showtimes_movies1_idx' => array('column' => 'movies_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'sala' => 'Lorem ipsum dolor sit amet',
			'hora' => 'Lorem ipsum dolor sit amet',
			'idioma' => 'Lorem ipsum dolor sit amet',
			'dia' => 'Lorem ipsum dolor sit amet',
			'movie_theaters_id' => 1,
			'movies_id' => 1
		),
	);

}
