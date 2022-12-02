<?php
include_once 'connection.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project_PI/model/Images.php';

function selectImage($id)
{
    try {
        $PDO = connect();
        try {
            $PDO->beginTransaction();
            $query = "SELECT nome FROM imagens WHERE id_imagens = ?";
            $stmt = $PDO->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            $image = new Images;
            $image->setName($result['nome']);
            return $image;
            $PDO->commit();
        } catch (Exception $e) {
            $PDO->rollBack();
            echo $e->getMessage();
        }
    } catch (Exception $e) {
        $PDO->rollBack();
        echo $e->getMessage();
    }
}


function deleteImage($id)
{
    try {
        $PDO = connect();
        try {
            $PDO->beginTransaction();
            $query = "DELETE FROM imagens WHERE id_imagens = ?";
            $stmt = $PDO->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (Exception $e) {
            $PDO->rollBack();
            echo $e->getMessage();
            return false;
        }
    } catch (Exception $e) {
        $PDO->rollBack();
        echo $e->getMessage();
        return false;
    }
}


function uploadImage(Images $image) // hes id
{
    try {
        $PDO = connect();
        try {
            $PDO->beginTransaction();
            $query = "INSERT INTO imagens (nome) VALUES (?)";
            $stmt = $PDO->prepare($query);
            $stmt->execute([$image->getName()]);
            $id = $PDO->lastInsertId();
            $PDO->commit();
            return $id;
        } catch (Exception $e) {
            $PDO->rollBack();
            echo $e->getMessage();
        }
    } catch (Exception $e) {
        $PDO->rollBack();
        echo $e->getMessage();
    }
}

function getIdImageBd () {
    
}