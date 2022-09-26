<?php

namespace App;
use \PDO;

class Teacher
{
	protected $id;
	protected $name;
	protected $phoneNumber;
	protected $email;
	protected $employeeId;

	// Database Connection Object
	protected $connection;

	public function __construct(
	$name = null, 
	$phoneNumber = null, 
	$email = null, 
	$employeeId = null)

	{
		$this->name = $name;
		$this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->employeeId = $employeeId;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getEmployeeId()
	{
		return $this->employeeId;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO teachers SET name=:name, phoneNumber=:phoneNumber, email=:email, employeeId=:employeeId";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':phoneNumber' => $this->getPhoneNumber(),
				':email' => $this->getEmail(),
				':employeeId' => $this->getEmployeeId()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM teachers WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->phoneNumber = $row['phoneNumber'];
			$this->email = $row['email'];
			$this->employeeId = $row['employeeID'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $phoneNumber, $email, $employeeID)
	{
		try {
			$sql = 'UPDATE teachers SET name=:name, phoneNumber=:phoneNumber, email=:email, employeeID=:employeeID WHERE id=:id';
			$statement = $this->connection->prepare($sql);

			$statement->execute([
				':id' => $id,
				':name' => $name,
				':phoneNumber' => $phoneNumber,
				':email' => $email,
				':employeeID' => $employeeID
			]);

			$this->id = $id;
			$this->name = $name;
			$this->phoneNumber = $phoneNumber;
			$this->email = $email;
			$this->employeeID = $employeeID;


		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM teachers WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM teachers';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}