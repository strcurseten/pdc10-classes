<?php

namespace App;
use \PDO;

class ClassRoster
{
	protected $id;
	protected $classCode;
    protected $studentId;
	protected $enrolledDate;

	// Database Connection Object
	protected $connection;

	public function __construct(
		$classCode = null, 
		$studentId = null, 
		$enrolledDate = null)
	{
		$this->classCode = $classCode;
        $this->studentId = $studentId;
		$this->enrolledDate = $enrolledDate;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getClassCode()
	{
		return $this->classCode;
	}

    public function getStudentId() 
    {
        return $this->studentId;
    }

	public function getEnrolledDate()
	{
		return $this->enrolledDate;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO class_rosters SET classCode=:classCode, studentId:=studentId, enrolledDate=:enrolledDate";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':classCode' => $this->getClassCode(),
                ':studentId' => $this->getStudentId(),
				':enrolledDate' => $this->getEnrolledDate(),
			]);

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
			$this->classCode = $row['classCode'];
            $this->studentId = $row['studentId'];
			$this->enrolledDate = $row['enrolledDate'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($classCode, $studentId, $enrolledDate)
	{
		try {
			$sql = 'UPDATE class_rosters SET classCode=?, studentId=?, enrolledDate=? WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$classCode,
                $studentId,
				$enrolledDate,
				$this->getId()
			]);
			$this->classCode = $classCode;
            $this->studentId = $studentId;
			$this->enrolledDate = $enrolledDate;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function delete()
	{
		try {
			$sql = 'DELETE FROM class_rosters WHERE classCode=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getClassCode()
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
			$sql = 'SELECT class_rosters.classCode as class_code, classes.name AS class_name, teachers.name as teacher_name, COUNT(classCode) as students_enrolled
			 FROM class_rosters
			 INNER JOIN classes 
			 ON class_rosters.classCode = classes.code
			 INNER JOIN teachers
			 ON classes.teacherID = teachers.employeeID
			 GROUP BY class_code';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getTeacherName($id)
	{
		try {
			$sql = 'SELECT teachers.name FROM teachers
			JOIN course
			ON teachers.id = course.teacherID';
			$statement = $this->connection->prepare($sql)->fetch();
			
			// $statement->execute([
			// 	':id' => $id
			// ]);

			// $row = $statement->fetch();

			// $this->id = $row['id'];
			// $this->classCode = $row['classCode'];
            // $this->studentId = $row['studentId'];
			// $this->enrolledDate = $row['enrolledDate'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}