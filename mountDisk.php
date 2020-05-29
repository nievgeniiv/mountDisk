<?php

$out = null;
$answer = null;

while (!$out) {
  shellExec();
  while (!$answer) {
    echo 'Подключить еще одну папку?[y/n]: ';
    $answer = trim(fgets(STDIN));
  }
  if ($answer === 'n' or $answer === 'N') {
    exit();
  }
  $answer = null;
}

function shellExec()
{
  $ipAdress = null;
  $login = null;
  $passwd = null;
  $folderLocal = null;
  $folderServer = null;

  while (!$ipAdress) {
    echo 'Введите ip-адрес сервера: ';
    $ipAdress = trim(fgets(STDIN));
  }
  while (!$folderServer) {
    echo 'Введите папку монтирования на сервере: ';
    $folderServer = trim(fgets(STDIN));
  }
  while (!$folderLocal) {
    echo 'Введите полный путь к папке монтирования на локальном компьютере: ';
    $folderLocal = trim(fgets(STDIN));
  }
  while (!$login) {
    echo 'Введите логин: ';
    $login = trim(fgets(STDIN));
  }
  while (!$passwd) {
    echo 'Введите пароль: ';
    $passwd = trim(fgets(STDIN));
  }
  $cmd = 'sudo mount -t cifs -o user='.$login.',password='.$passwd.',file_mode=0777,dir_mode=0777 //'
          .$ipAdress.'/'.$folderServer.' '.$folderLocal;
  shell_exec($cmd);
}