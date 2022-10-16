<?php

namespace App;
use \PDO;

class Student
{
	protected $id;
	protected $name;
    protected $student_id;
	protected $phone_number;
	protected $email;
	protected $program;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$name = null, 
		$student_id = null, 
		$phone_number = null, 
		$email = null, 
		$program = null)
	{
		$this->name = $name;
        $this->student_id = $student_id;
		$this->phone_number = $phone_number;
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
        return $this->student_id;
    }

	public function getPhoneNumber()
	{
		return $this->phone_number;
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
			student_id=:student_id, 
			phone_number=:phone_number, 
			email=:email, 
			program=:program";

			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
                ':student_id' => $this->getStudentId(),
				':phone_number' => $this->getPhoneNumber(),
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
            $this->student_id = $row['student_id'];
			$this->phone_number = $row['phone_number'];
			$this->email = $row['email'];
			$this->program = $row['program'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $student_id, $phone_number, $email, $program)
	{
		try {
			$sql = 'UPDATE students SET name=:name, student_id=:student_id, phone_number=:phone_number, email=:email, program=:program WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id,
				':name' => $name,
                ':student_id' => $student_id,
				':phone_number' => $phone_number,
				':email' => $email,
				':program' => $program,
			]);

			$this->id = $id;
			$this->name = $name;
            $this->student_id = $student_id;
			$this->phone_number = $phone_number;
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

	public function viewClasses($student_id)
	{
		try {
			$sql = 'SELECT * FROM class_roster 
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

	public function getClasses($id)
	{
		try {
			$sql = 'SELECT class_rosters.class_code AS class_id,
			classes.name AS class_name,
			classes.code AS class_code
			FROM class_rosters
			INNER JOIN classes
			ON class_rosters.class_code = classes.id
			WHERE student_id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetchAll();
			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}