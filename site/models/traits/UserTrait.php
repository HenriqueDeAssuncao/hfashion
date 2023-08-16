<?php
trait UserTrait
{
  private $id;
  private $nickname;
  private $email;
  private $password;
  private $image;
  private $bio;
  private $token;

  //SETTERS E GETTERS
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNickname()
  {
    return $this->nickname;
  }
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }

  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getImage()
  {
    return $this->image;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }

  public function getBio()
  {
    return $this->bio;
  }
  public function setBio($bio)
  {
    $this->bio = $bio;
  }

  public function getToken()
  {
    return $this->token;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
}