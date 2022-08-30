<?php 

require_once("app/model/model.php");
class UserModel extends Model {

    public function updateJWT ($token,$exp,$account){
       $sql= "UPDATE accounts SET token_exp = ?, token = ? WHERE accounts.login = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$exp,$token,$account]);

    }
       public function addAccount($name, $password,$email)
{
        $query = $this->pdo->prepare("INSERT INTO `accounts` (`login`, `password`, `lastactive`, `access_level`, `lastIP`, `lastServer`,`email`) VALUES (?, ?, ?, ?, ?,?,?);");
        $query->execute([$name, $password, NULL , 0, NULL,1,$email]);
       
    }
    public function getAccounts (){
        $query = $this->pdo->prepare('SELECT * FROM accounts');
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
    public function getAccount($name)
     {
        $query = $this->pdo->prepare('SELECT * FROM accounts WHERE login = ?');
        $query->execute([$name]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    public function getPjs($account){
        $query = $this->pdo->prepare('SELECT * FROM characters WHERE account_name = ?');
        $query->execute([$account]);
        $pjs = $query->fetchAll(PDO::FETCH_OBJ);
        return $pjs;
        
    }
    public function getPj($char){
        $query = $this->pdo->prepare('SELECT * FROM characters WHERE char_name = ?');
        $query->execute([$char]);
        $char = $query->fetch(PDO::FETCH_OBJ);
        return $char;
        
    }
    public function getInventario ($idPj){
        $query = $this->pdo->prepare('SELECT * FROM items WHERE owner_id= ?');
        $query->execute([$idPj]);
        $inv = $query->fetchAll(PDO::FETCH_OBJ);
        return $inv;
    }
    public function addNoticia($mensaje,$fecha,$autor){
        $query = $this->pdo->prepare("INSERT INTO `comentarios` (`autor`, `fecha`, `mensaje`) VALUES (?, ?, ?)");
        $query->execute([$autor, $fecha, $mensaje]);
        return $query;
    }
    public function armor($char){
        $sql= "SELECT * FROM items JOIN armor ON items.item_id = armor.item_id  WHERE owner_id= ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$char]);
        $inv = $query->fetchAll(PDO::FETCH_OBJ);
        return $inv;
    }
    public function weapon($char){
        $sql= "SELECT * FROM items JOIN weapon ON items.item_id = weapon.item_id  WHERE owner_id= ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$char]);
        $inv = $query->fetchAll(PDO::FETCH_OBJ);
        return $inv;
    }
    public function misc($char){
        $sql= "SELECT * FROM items JOIN etcitem ON items.item_id = etcitem.item_id  WHERE owner_id= ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$char]);
        $inv = $query->fetchAll(PDO::FETCH_OBJ);
        return $inv;
    }
    public function getAllNoticias(){
        $query = $this->pdo->prepare('SELECT * FROM comentarios');
        $query->execute();
        $noticias = $query->fetchAll(PDO::FETCH_OBJ);
        return $noticias;
    }
    public function getBaseClass($id){
        $query = $this->pdo->prepare('SELECT * FROM class_list WHERE id = ? ');
        $query->execute([$id]);
        $class = $query->fetch(PDO::FETCH_OBJ);
        return $class;
    }
    public function getClan($id){
        $query = $this->pdo->prepare('SELECT * FROM clan_data WHERE clan_id = ? ');
        $query->execute([$id]);
        $clan = $query->fetch(PDO::FETCH_OBJ);
        return $clan;
    }
    public function pruebaModel(){
        

        return;
    }
    
    
}