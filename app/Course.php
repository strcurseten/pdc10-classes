<?php

namespace App;
use \PDO;

class Course
{
	protected $id;
	protected $name;
	protected $code;
	protected $description;
	protected $teacher_id;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$name = null, 
		$code = null, 
		$description = null, 
		$teacher_id = null)
	{
		$this->name = $name;
		$this->code = $code;
		$this->description = $description;
		$this->teacher_id = $teacher_id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getTeacherId()
	{
		return $this->teacher_id;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO classes SET name=:name, code=:code, description=:description, teacher_id=:teacher_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':code' => $this->getCode(),
				':description' => $this->getDescription(),
				':teacher_id' => $this->getTeacherId()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM classes WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->code = $row['code'];
			$this->description = $row['description'];
			$this->teacher_id = $row['teacher_id'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $code, $description, $teacher_id)
	{
		try {
			$sql = 'UPDATE classes SET name=:name, code=:code, description=:description, teacher_id=:teacher_id WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id,
				':name' => $name,
				':code' => $code,
				':description' => $description,
				':teacher_id' => $teacher_id,
			]);

			$this->id = $id;
			$this->name = $name;
			$this->code = $code;
			$this->description = $description;
			$this->teacher_id = $teacher_id;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM classes WHERE id=?';
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
			$sql = 'SELECT * FROM classes';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getTeacherName($id)
	{
		try {
			$sql = 'SELECT teachers.name AS teacher_name 
			FROM teachers
			INNER JOIN classes
			ON teachers.id = classes.teacher_id 
			WHERE classes.teacher_id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			//$this->id = $row['id'];
			$this->teacher_name = $row['teacher_name'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}