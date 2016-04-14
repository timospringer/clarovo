<?php

require_once("Manager.php");
require_once("Vorlesung.php");

require_once("Dozent.php");
require_once("DozentManager.php");

class VorlesungManager extends Manager
{
    protected $pdo;

    public function __construct($connection = null)
    {
        parent::__construct($connection);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function findById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM vorlesung WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            $n = $stmt->fetch();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        if (!$n) $n = null;
        return $n;
    }
    
    public function findAll($dozent)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT id, name FROM vorlesung WHERE id_dozent = :dozent');
            $stmt->bindParam(':dozent', $dozent);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function save(Vorlesung $vorlesung)
    {
        
        try {
            $stmt = $this->pdo->prepare('INSERT INTO vorlesung(name, id_dozent) VALUES (:name, :id_dozent)');
            $stmt->bindParam(':name', $vorlesung->name);
            $stmt->bindParam(':id_dozent', $vorlesung->id_dozent);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $vorlesung;
    }
    
    public function delete(Vorlesung $vorlesung)
    {
        if (!isset($vorlesung->id)) {
            $vorlesung = null;
            return $vorlesung;
        }
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM vorlesung WHERE id= :id
            ');
            $stmt->bindParam(':id', $vorlesung->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $vorlesung = null;
        return $vorlesung;
    }
}