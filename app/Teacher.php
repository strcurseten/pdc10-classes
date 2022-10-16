<?php

namespace App;
use \PDO;

class Teacher
{
	protected $id;
	protected $name;
	protected $phone_number;
	protected $email;
	protected $employee_id;

	// Database Connection Object
	protected $connection;

	public function __construct(
	$name = null, 
	$phone_number = null, 
	$email = null, 
	$employee_id = null)

	{
		$this->name = $name;
		$this->phone_number = $phone_number;
        $this->email = $email;
        $this->employee_id = $employee_id;
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
		return $this->phone_number;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getEmployeeId()
	{
		return $this->employee_id;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO teachers SET name=:name, phone_number=:phone_number, email=:email, employee_id=:employee_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':phone_number' => $this->getPhoneNumber(),
				':email' => $this->getEmail(),
				':employee_id' => $this->getEmployeeId()
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
			$this->phone_number = $row['phone_number'];
			$this->email = $row['email'];
			$this->employee_id = $row['employee_id'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $phone_number, $email, $employee_id)
	{
		try {
			$sql = 'UPDATE teachers SET name=:name, phone_number=:phone_number, email=:email, employee_id=:employee_id WHERE id=:id';
			$statement = $this->connection->prepare($sql);

			$statement->execute([
				':id' => $id,
				':name' => $name,
				':phone_number' => $phone_number,
				':email' => $email,
				':employee_id' => $employee_id
			]);

			$this->id = $id;
			$this->name = $name;
			$this->phone_number = $phone_number;
			$this->email = $email;
			$this->employee_id = $employee_id;


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

	public function viewClasses($teacher_id)
	{
		try {
			$sql = 'SELECT * FROM classes 
			WHERE teacher_id=:teacher_id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':teacher_id' => $teacher_id
			]);

			$row = $statement->fetchAll();
			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

}