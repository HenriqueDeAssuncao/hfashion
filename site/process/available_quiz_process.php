<?php
require_once __DIR__ . "/../helpers/db.php";
require_once __DIR__ . "/../helpers/url.php";
require_once __DIR__ . "/../models/UserAnswerQuestion.php";
require_once __DIR__ . "/../dao/UserAnswerQuestionDAO.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../dao/UserDAO.php";

$userDao = new UserDAO($conn, $CURRENT_URL);
$userData = $userDao->verifyToken(true);

$userId = $_GET["user"];
$quizId = $_GET["quizId"];

$userAnswerQuestion = new UserAnswerQuestion();
$userAnswerQuestionDao = new UserAnswerQuestionDAO($conn, $CURRENT_URL);

$userAnswerQuestion->setUserId($userId);
$userAnswerQuestion->setQuizId($quizId);

$userAnswerQuestionDao->setStatusToAvailable($userAnswerQuestion);