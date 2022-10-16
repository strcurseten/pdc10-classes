<?php

namespace App;
use \PDO;

class ClassRoster
{
	protected $id;
	protected $class_code;
    protected $student_id;
	protected $enrolled_date;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$class_code = null, 
		$student_id = null, 
		$enrolled_date = null)
	{
		$this->class_code = $class_code;
        $this->student_id = $student_id;
		$this->enrolled_date = $enrolled_date;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getClassCode()
	{
		return $this->class_code;
	}

    public function getStudentId() 
    {
        return $this->student_id;
    }

	public function getEnrolledDate()
	{
		return $this->enrolled_date;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO class_rosters SET class_code=:class_code, student_id=:student_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':class_code' => $this->getClassCode(),
                ':student_id' => $this->getStudentId()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getByClassId($class_code)
	{
		try {
			$sql = 'SELECT student_id, id FROM class_rosters 
			WHERE class_code=:class_code';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':class_code' => $class_code
			]);

			$row = $statement->fetchAll();
			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM class_rosters WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['class_code'];
			$this->code = $row['student_id'];
			$this->description = $row['enrolled_date'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($class_code, $student_id, $enrolled_date)
	{
		try {
			$sql = 'UPDATE class_rosters SET class_code=?, student_id=?, enrolled_date=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$class_code,
                $student_id,
				$enrolled_date,
				$this->getId()
			]);
			$this->class_code = $class_code;
            $this->student_id = $student_id;
			$this->enrolled_date = $enrolled_date;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM class_rosters WHERE id=?';
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
			$sql = 'SELECT * FROM class_rosters';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getRoster(){
		try {
			$sql = 'SELECT class_rosters.id AS roster_id,
			classes.code AS class_code, 
			classes.id AS class_id,
			classes.name AS class_name, 
			teachers.name AS teacher_name, 
			COUNT(class_rosters.class_code) as students_enrolled
			FROM classes
			LEFT JOIN class_rosters 
			ON classes.id = class_rosters.class_code
			INNER JOIN teachers
			ON classes.teacher_id = teachers.id
			GROUP BY classes.code';

			$data = $this->connection->query($sql)->fetchAll();
			return $data;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getStudentInfo($id)
	{
		try {
			$sql = 'SELECT students.name AS student_name,
			students.student_id AS student_id,
			students.id AS id,
			class_rosters.enrolled_date AS enrolled_date
			FROM students
			INNER JOIN class_rosters
			ON class_rosters.student_id = students.id 
			WHERE students.id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			//$this->id = $row['id'];
			$this->student_name = $row['student_name'];
			$this->enrolled_date = $row['enrolled_date'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

}