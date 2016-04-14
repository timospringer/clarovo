<?php

require_once("Manager.php");

require_once("Voting.php");

class VotingManager extends Manager
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
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function findAll($vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT id, frage, a, b, c, d FROM voting WHERE id_vorlesung = :vorlesung');
            $stmt->bindParam(':vorlesung', $vorlesung);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }
    
    public function save(Voting $voting)
    {
        
        try {
            $stmt = $this->pdo->prepare('INSERT INTO voting (frage, a, b, c, d, id_vorlesung) VALUES (:frage, :a , :b, :c, :d, :id_vorlesung)');
            $stmt->bindParam(':frage', $voting->frage);
            $stmt->bindParam(':a', $voting->a);
            $stmt->bindParam(':b', $voting->b);
            $stmt->bindParam(':c', $voting->c);
            $stmt->bindParam(':d', $voting->d);
            $stmt->bindParam(':id_vorlesung', $voting->id_vorlesung);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $voting;
    }
    
    public function delete(Voting $voting)
    {
        if (!isset($voting->id)) {
            $voting = null;
            return $voting;
        }
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM voting WHERE id= :id
            ');
            $stmt->bindParam(':id', $voting->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $voting = null;
        return $voting;
    }
}