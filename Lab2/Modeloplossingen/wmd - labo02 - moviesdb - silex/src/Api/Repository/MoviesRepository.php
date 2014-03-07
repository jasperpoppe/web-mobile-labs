<?php

namespace Api\Repository;

class MoviesRepository extends \Knp\Repository {

	public function getTableName() {
		return 'movies';
	}

	public function getGenres($id) {
		return $this->db->fetchAll('SELECT g_id FROM movies_genres WHERE m_id = ?', array($id));
	}

	public function getPeople($id) {
		return $this->db->fetchAll('SELECT p_id, role FROM movies_people WHERE m_id = ?', array($id));
	}

}