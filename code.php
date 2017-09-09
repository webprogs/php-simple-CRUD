<?php
	/*
	* Author: webprogs team
	* URL: https://www.webprogs.com
	*/
	class Users {
		public $db;
		public function __construct() {
			// Mysql connection
			$this->db = new mysqli("localhost", "root","","db_cs315");
		}

		// inserting data
		public function insert($name, $age, $gender) {
			// creating prepared statement
			$sql = $this->db->prepare("INSERT INTO tbl_users (name, age, gender) VALUES(?, ?, ?)");
			$sql->bind_param('sis', $name, $age, $gender);
			return $sql->execute();
		}

		public function getData() {
			$data = array();
			$sql = $this->db->prepare("SELECT * FROM tbl_users");
			$sql->execute();

			// fetch result
			$get_result = $sql->get_result();
			// fetching data and storing to array
			while($res = $get_result->fetch_object()) {
				$data[] = $res;
			}
			// return array
			return $data;
		}

		public function getUserById($id) {
			$data = array();
			$sql = $this->db->prepare("SELECT * FROM tbl_users WHERE id = ?");
			$sql->bind_param('i', $id);
			$sql->execute();

			// fetch result
			$get_result = $sql->get_result();
			// fetching data and storing to array
			$res = $get_result->fetch_object();
			return $res;
		}

		// updating data
		public function updateUserById($data) {
			$sql = $this->db->prepare("UPDATE tbl_users SET name = ?, age = ?, gender = ? WHERE id = ?");
			$sql->bind_param('sisi', $data['name'], $data['age'], $data['gender'], $data['id']);
			return $sql->execute();
		}

		// deleting data
		public function delete($id) {
			$return = false;
			$sql = $this->db->prepare("DELETE FROM tbl_users WHERE id = ?");
			$sql->bind_param('i', $id);
			$sql->execute();

			// Count affected rows
			if($sql->affected_rows > 0) {
				$return = true;
			}
			return $return;
		}
	}