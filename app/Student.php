<?php

namespace App;
use \PDO;

class Student
{
	protected $id;
	protected $name;
    protected $studentId;
	protected $phoneNumber;
	protected $email;
	protected $program;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$name = null, 
		$studentId = null, 
		$phoneNumber = null, 
		$email = null, 
		$program = null)
	{
		$this->name = $name;
        $this->studentId = $studentId;
		$this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->program = $program;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

    public function getStudentId() 
    {
        return $this->studentId;
    }

	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getProgram()
	{
		return $this->program;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO students 
			SET name=:name, 
			studentId=:studentId, 
			phoneNumber=:phoneNumber, 
			email=:email, 
			program=:program";

			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
                ':studentId' => $this->getStudentId(),
				':phoneNumber' => $this->getPhoneNumber(),
				':email' => $this->getEmail(),
				':program' => $this->getProgram()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM students WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
            $this->studentId = $row['studentId'];
			$this->phoneNumber = $row['phoneNumber'];
			$this->email = $row['email'];
			$this->program = $row['program'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($name, $studentId, $phoneNumber, $email, $program)
	{
		try {
			$sql = 'UPDATE students SET name=?, studentId=?, phoneNumber=?, $email=?, program=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$name,
                $studentId,
				$phoneNumber,
				$email,
				$program,
				$this->getId()
			]);
			$this->name = $name;
            $this->studentId = $studentId;
			$this->phoneNumber = $phoneNumber;
			$this->email = $email;
			$this->program = $program;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM students WHERE id=?';
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
			$sql = 'SELECT * FROM students';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}