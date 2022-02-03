<?php
class CustomerRepository extends BaseRepository{
	function fetchAll($condition = null)
	{
		global $conn;
		$customers = array();
		$sql = "SELECT * FROM customer";
			
		if ($condition) 
		{
			$sql .= " WHERE $condition";
		}

		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				
				$customer = new Customer($row["id"], $row["name"], $row["password"], $row["mobile"], $row["email"], $row["login_by"], $row["ward_id"], $row["housenumber_street"], $row["is_active"]);
				$customers[] = $customer;
			}
		}

		return $customers;
	}

	function getAll() {
		return $this->fetchAll();
	}

	function findEmail($email) {
		$condition = "email = '$email'";
		$customers = $this->fetchAll($condition);
		$customer = current($customers);
		return $customer;
	}

	function findEmailAndPassword($email, $password) {
		$condition = "email = '$email' AND password = '$password'";
		$customers = $this->fetchAll($condition);
		$customer = current($customers);
		return $customer;
	}


	function save($data) {
		global $conn;
		$name = $data["name"];
		$password = $data["password"];
		$mobile = $data["mobile"];
		$email = $data["email"];
		$login_by = $data["login_by"];
		$ward_id = $data["ward_id"];
		$is_active = $data["is_active"];
		$housenumber_street = $data["housenumber_street"];
		if (empty($ward_id)) {
			$ward_id = "NULL";
		}

		// if (empty($is_active)) {
		// 	$is_active = 0;
		// }

		$sql = "INSERT INTO customer (name, password, mobile, email, login_by, ward_id, housenumber_street, is_active) 
		VALUES ('$name', '$password', '$mobile', '$email', '$login_by', $ward_id, '$housenumber_street', $is_active)";
		if ($conn->query($sql)) {
			return true;
		}
		$this->error = "Error: " . $sql . $conn->error;
		return false;
	}


	function find($id) {
		global $conn; 
		$condition = "id = $id";
		$customers = $this->fetchAll($condition);
		$customer = current($customers);
		return $customer;
	}
}