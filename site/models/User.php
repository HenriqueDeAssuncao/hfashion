<?php

require_once "traits/UserTrait.php";

class User
{
    use UserTrait;

    //FUNÇÕES QUE NÃO VÃO INTERAGIR COM O BANCO
    public function generateToken()
    {
        return bin2hex(random_bytes(25)); //Aqui estou criando a hash
    }
    public function generatePassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    public function imageGenerateName()
    {
        return bin2hex(random_bytes(60)) . ".jpg"; //Pra gerar um nome para a imagem que não possa ser substituida por outra de nome igual
    }
}

interface UserDAOInterface
{
    public function buildUser($data);
    public function create(User $user, $auth = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($nickname_email, $password);
    public function findByNickname($nickname);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();
    public function changePassword(User $user);
}