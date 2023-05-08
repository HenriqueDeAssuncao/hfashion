*SEMPRE FAÇA O CSS PRIMEIRO PARA CELULAR*;

*O ARQUIVO SÓ FUNCIONA SE O BANCO ESTIVER CRIADO*;

*COPIAR E COLAR NO PHPMYADMIN PARA CRIAR O BANCO DE DADOS:*

      CREATE DATABASE hfashion;
      USE hfashion;
      CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nickname VARCHAR(100),
        email VARCHAR(100),
        password VARCHAR(100),
        image VARCHAR(100),
        bio TEXT,
        token VARCHAR(100)
      );

*NA ESCOLA, SUBSTITUA O helpers/url.php POR:*

      session_start();
      $CURRENT_URL = "http://" . $_SERVER['SERVER_NAME'] .":8080". dirname($_SERVER['REQUEST_URI']. '?');


