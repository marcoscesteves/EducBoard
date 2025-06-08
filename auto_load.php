<?php if (session_status() !== PHP_SESSION_ACTIVE) {
    session_cache_expire(60);
    session_start();
}
require_once 'classes/turma.php';
require_once 'classes/aluno.php';
require_once 'classes/professor.php';
header('Content-Type: text/html; charset=utf-8'); ?>
