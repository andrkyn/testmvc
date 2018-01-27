<?php

try{
   $connect =new PDO("mysql:host=localhost;dbname=testDB", 'root','sql123');
   if (empty($_POST['name'])) exit("Поле не заполнено");//проверка, заполнены ли поля нашей html формы
   if (empty($_POST['content'])) exit("Поле не заполнено");//проверка, заполнены ли поля нашей html формы

    $query ="INSERT INTO message VALUES (NULL , :name, NOW())";
    $msg =$connect->prepare($query); /*prepare -подготовка к выполнению запроса с переменной query
      и возвращает ассоциированный с этим запросом объект */
    $msg->execute(['name'=>$_POST['name']]);
    $msg_id =$connect->lastInsertId(); //получить последний идентификатор с помощью функции lastInsertId
    $query ="INSERT INTO message_content VALUES (NULL , :content, :message_id)"; //формируем ещё запрос с переменной query
    $msg =$connect->prepare($query); //подготовка следующего запроса
    $msg->execute(['content'=>$_POST['content'], 'message_id' =>$msg_id]);

    header("Location: index.html"); // переадресация на главную страницу

}catch (PDOException $e) { //если возникнут ошибки
    echo "error" .$e->getMessage();
}