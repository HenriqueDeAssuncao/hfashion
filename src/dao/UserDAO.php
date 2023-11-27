<?php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Message.php";

class UserDAO implements UserDAOinterface
{
    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildUser($data)
    {
        $user = new User();

        $user->setId($data["id"]);
        $user->setNickname($data["nickname"]);
        $user->setEmail($data["email"]);
        $user->setPassword($data["password"]);
        $user->setImage($data["image"]);
        $user->setBio($data["bio"]);
        $user->setToken($data["token"]);

        return $user;
    }
    public function create(User $user, $auth = false)
    {
        $nickname = $user->getNickname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $image = "img/system/avatars/user.svg";
        $token = $user->getToken();

        $stmt = $this->conn->prepare("INSERT INTO users (
                nickname, email, password, image, token
                ) VALUES (
                    :nickname, :email, :password, :image , :token
                )");

        $stmt->bindParam(":nickname", $nickname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":token", $token);
        $stmt->execute();

        if ($auth) {
            $this->setTokenToSession($user->getToken());
        }
    }
    public function update(User $user, $redirect = true)
    {
        $nickname = $user->getNickname();
        $email = $user->getEmail();
        $image = $user->getImage();
        $token = $user->getToken();
        $bio = $user->getBio();
        $id = $user->getId();

        $stmt = $this->conn->prepare("UPDATE users SET
            nickname = :nickname,
            email = :email,
            image = :image,
            bio = :bio,
            token= :token
            WHERE id = :id
            ");

        $stmt->bindParam(":nickname", $nickname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":bio", $bio);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if ($redirect) {
            //Redirecionapara o perfil do usuário
            $this->message->setMessage("Dados atualizados com sucesso.", "success", "back");
        }
    }
    public function verifyToken($protected = false)
    {
        if (!empty($_SESSION["token"])) {
            //Se estiver vazio oo usuário não está autenticado
            $token = $_SESSION["token"];
            $user = $this->findByToken($token); //Retorna o user correspondente

            if ($user) {
                return $user;
            } else if ($protected) {
                $this->message->setMessage("Faça <a href='$this->url/signup.php'>autenticação</a> para acessar a página.", "error", "kick");
            }
        } else if ($protected) {
            $this->message->setMessage("Faça <a href='$this->url/signup.php'>autenticação</a> para acessar a página.", "error", "kick");
        }
    }
    public function setTokenToSession($token, $redirect = true)
    {
        //Salvar token na session
        $_SESSION["token"] = $token;
        if ($redirect) {
            $this->message->setMessage("Seja bem-vindo.", "success");
        }
    }
    public function authenticateUser($nickname_email, $password)
    {

        if ($this->findByNickname($nickname_email)) {
            $user = $this->findByNickname($nickname_email);

        } else if ($this->findByEmail($nickname_email)) {
            $user = $this->findByEmail($nickname_email);
        } else {
            return false;
        }

        if ($user) {
            //Checar se as senhas batem
            if (password_verify($password, $user->getPassword())) {
                //Gerar um tolken e inserir na session
                $token = $user->generateToken();
                $this->setTokenToSession($token, false);
                //Atualizar token do usuário
                $user->setToken($token);
                $this->update($user, false);
                return $user;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }
    public function findByNickname($nickname)
    {
        if ($nickname != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE nickname = :nickname");
            $stmt->bindParam(":nickname", $nickname);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function findByEmail($email)
    {
        if ($email != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function findById($id)
    {
        if ($id != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function findByToken($token)
    {
        if ($token != "") {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
            $stmt->bindParam(":token", $token);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function destroyToken()
    {
        $_SESSION['token'] = "";
        $this->message->setMessage("Você fez logout com sucesso.", "success", "signin.php");
    }
    public function changePassword(User $user)
    {
        if ($user) {
            $password = $user->getPassword();
            $id = $user->getId();

            $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $this->message->setMessage("Senha atualizada com sucesso.", "success" , "back");
        }
    }
}