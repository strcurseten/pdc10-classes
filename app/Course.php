<?php

namespace App;
use \PDO;

class Course
{
	protected $id;
	protected $name;
	protected $classCode;
	protected $description;
	protected $teacherId;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$name = null, 
		$classCode = null, 
		$description = null, 
		$teacherId = null)
	{
		$this->name = $name;
		$this->classCode = $classCode;
		$this->description = $description;
		$this->teacherId = $teacherId;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getClassCode()
	{
		return $this->classCode;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getTeacherId()
	{
		return $this->teacherId;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO classes SET name=:name, classCode=:classCode, description=:description, teacherId=:teacherId";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':classCode' => $this->getClassCode(),
				':description' => $this->getDescription(),
				':teacherId' => $this->getTeacherId()
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
			$this->classCode = $row['classCode'];
			$this->description = $row['description'];
			$this->teacherID = $row['teacherID'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $name, $classCode, $description, $teacherId)
	{
		try {
			$sql = 'UPDATE classes SET name=:name, classCode=:classCode, description=:description, teacherId=:teacherId WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id,
				':name' => $name,
				':classCode' => $classCode,
				':description' => $description,
				':teacherId' => $teacherId,
			]);

			$this->id = $id;
			$this->name = $name;
			$this->classCode = $classCode;
			$this->description = $description;
			$this->teacherId = $teacherId;

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
}