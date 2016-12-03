<?php
class User {

    private $model;

    function User($model)
    {

        $this->model = $model;
    }

    public function usernameCheck($uid)
    {
        $uid = mysql_real_escape_string($uid);
        $rs = $this->model->executeCommand("SELECT username FROM users WHERE uid='$uid'");
        if (!$rs->EOF) {
            return $rs->fields['username'];
        } else {
            return false;
        }
    }

    public function User_Login($username, $password)
    {
        $username = mysql_real_escape_string($username);
        //$password = mysql_real_escape_string($password);
        $md5_password = md5($password);// or
        $rs = $this->model->executeCommand("SELECT uid FROM users WHERE username='$username' and password='$md5_password' AND status='1'");
        if ($rs->EOF)
            $rs = $this->model->executeCommand("SELECT uid FROM users WHERE email='$username' and password='$md5_password' AND status='1'");
        if (!$rs->EOF)
            return $rs->fields['uid'];

        return 0;

    }
    public function User_Delete($uid){
       $this->model->executeCommand("DELETE FROM users WHERE uid='$uid'");
    }

    public function User_Data($uid)
    {
        $rs = $this->model->executeCommand("SELECT * FROM users WHERE uid='$uid'");
        return $rs;

    }

    public function User_Registration($post)
    {

        if(isset($post['password']))
            $md5_password = md5($post['password']);
        else{
            $codigo=md5(microtime());
            $md5_password=strtoupper(substr($codigo, 0, 8));
        }
        $sql="INSERT INTO users VALUES ('',";
        $sql.="'".$post['rut']."',";
        $sql.="'".$post['razon']."',";
        $sql.="'".$post['nombre']."',";
        $sql.="'".$post['email']."',";
        $sql.="'".$post['direccion']."',";
        $sql.="'".$post['telefono']."',";
        $sql.="".$post['region'].",";
        $sql.="".$post['ciudad'].",";
        $sql.="".$post['comuna'].",";
        $sql.="'".$post['postal']."',";
        $sql.="'".$post['username']."',";
        $sql.="'".$md5_password."',";
        $sql.="1,SYSDATE()";
        $sql.=")";
        $this->model->executeCommand($sql);
        $rs = $this->model->executeCommand("select last_insert_id() as usuario");
        return $rs->fields['usuario'];
    }



    public function User_Update_Direccion($post,$id)
    {
        $sql="UPDATE users SET ";
        $sql.="direccion='".$post['direccion']."',";
        $sql.="region='".$post['seleccion-region']."',";
        $sql.="ciudad='".$post['seleccion-ciudad']."',";
        $sql.="comuna='".$post['comuna']."',";
        $sql.="postal='".$post['postal']."'";
        $sql.=" WHERE uid=".$id;
        $this->model->executeCommand($sql);
    }
    public function User_Update_Registration($post)
    {
        $md5_password = md5($post['password']);
        $sql="UPDATE users SET ";
        $sql.="rut='".$post['rut']."',";
        $sql.="razon='".$post['razon']."',";
        $sql.="nombre='".$post['nombre']."',";
        $sql.="email='".$post['email']."',";
        $sql.="direccion='".$post['direccion']."',";
        $sql.="telefono='".$post['telefono']."',";
        $sql.="region='".$post['region']."',";
        $sql.="ciudad='".$post['ciudad']."',";
        $sql.="comuna='".$post['comuna']."',";
        $sql.="postal='".$post['postal']."',";
        if($post['password']!="")
            $sql.="password='".$md5_password."',";
        $sql.="username='".$post['username']."'";
        $sql.=" WHERE uid=".$post['uid'];
        $this->model->executeCommand($sql);
    }
} 