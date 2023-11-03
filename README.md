*SEMPRE FAÇA O CSS PRIMEIRO PARA CELULAR*;

*O ARQUIVO SÓ FUNCIONA SE O BANCO ESTIVER CRIADO*;

*COPIAR E COLAR NO PHPMYADMIN PARA CRIAR O BANCO DE DADOS:*

          create database hifashion;
          
          commit;
          
          use hifashion;
          
          create table users (
          id int auto_increment primary key,
          nickname varchar(100),
          email varchar(100),
          password varchar(100),
          image varchar(100),
          bio text,
          token varchar(100)
          );

          create table quizzes (
          quiz_id int auto_increment primary key, 
          user_id int not null,
          quiz_name varchar(15) not null,
          quiz_description varchar(54),
          quiz_token varchar(100) not null,
          questions_number int,
          question_weight int (1),
          icon varchar(100),
          status int(1)
          );
      
          create table users_answer_questions (
          id_user_answer_question int auto_increment primary key,
          user_id int not null,
          quiz_id int not null,
          tries int(1),
          quiz_status int(1),
          score int(11),
          score_portion varchar(7)
          );

          create table users_total_score (
          user_total_score_id int auto_increment primary key,
          user_id int not null,
          total_score(11) int
          );
          
          create table questions (
          question_id int auto_increment primary key,
          question varchar(52) not null,
          image varchar(100),
          options text not null,
          answer int(1) not null,
          quiz_id int not null
          );
          
          create table avatars (
          avatar_id int auto_increment primary key,
          quiz_id int not null,
          avatar_name varchar(45),
          avatar_path varchar(100)
          );
          
          create table emblems (
          emblem_id int auto_increment primary key,
          quiz_id int not null,
          emblem_name varchar(45),
          emblem_path varchar(100)
          );
          
          create table users_avatars (
          user_avatar_id int auto_increment primary key,
          user_id int not null,
          avatar_id int not null
          );
          
          create table users_emblems (
          user_emblem_id int auto_increment primary key,  
          user_id int not null,
          emblem_id int not null
          );

          alter table users_answer_questions add CONSTRAINT fk_user FOREIGN KEY (user_id) references users(id);
          alter table users_answer_questions add CONSTRAINT fk_quiz FOREIGN KEY (quiz_id) references quizzes(quiz_id);

          alter table users_total_score add CONSTRAINT fk_users_total_score_users FOREIGN KEY (user_id) references users(id);
          
          alter table questions add CONSTRAINT fk_quiz_question FOREIGN KEY (quiz_id) references quizzes(quiz_id);

          alter table emblems add CONSTRAINT fk_quiz_emblem FOREIGN KEY (quiz_id) references quizzes(quiz_id);

          alter table avatars add CONSTRAINT fk_quiz_avatars FOREIGN KEY (quiz_id) references quizzes(quiz_id);
          
          alter table users_avatars add CONSTRAINT fk_user_user_avatar FOREIGN KEY (user_id) references users(id);
          alter table users_avatars add CONSTRAINT fk_avatar_user_avatar FOREIGN KEY (avatar_id) references avatars(avatar_id);
          
          alter table users_emblems add CONSTRAINT fk_user_user_emblem FOREIGN KEY (user_id) references users(id);
          alter table users_emblems add CONSTRAINT fk_emblem_user_emblem FOREIGN KEY (emblem_id) references emblems(emblem_id);
          
          alter table quizzes add CONSTRAINT fk_user_quiz FOREIGN KEY (user_id) references users(id);

 

*NA ESCOLA, SUBSTITUA O helpers/url.php POR:*

      <?php
            session_start();
            $CURRENT_URL = "http://" . $_SERVER['SERVER_NAME'] .":8080". dirname($_SERVER['REQUEST_URI']. '?');
