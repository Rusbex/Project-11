<?php
header('Content-Type: text/html; charset=utf-8');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение значений полей формы
    $name = $_POST['name'];
    $number = $_POST['number'];

    // Создание объекта PHPMailer
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    // Настройка параметров SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.mail.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'rustam@biggrin.kz';
    $mail->Password = '7JqRY1b7HLYhGM9g3Buw';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    // Настройка параметров письма
    $mail->setFrom('rustam@biggrin.kz', 'Admin');
    $mail->addAddress('rustam@biggrin.kz');
    $mail->Subject = 'Запрос на обратный звонок';
    $mail->Body = "Имя: $name\nНомер телефона: $number";

    session_start();

    // Отправка письма
    if ($mail->send()) {
        // Подключение к базе данных
        $db = new PDO('sqlite:database.sqlite');

        // Подготовка SQL-запроса
        $sql = "INSERT INTO user (name, number) VALUES (:name, :number)";
        $stmt = $db->prepare($sql);

        // Привязка значений к параметрам
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':number', $number);

        // Выполнение запроса
        if ($stmt->execute()) {
            echo 'Данные успешно сохранены в базе данных.';
        } else {
            echo 'Ошибка при сохранении данных в базе данных.';
        }

        // Сохранение данных из формы в сессии
        $_SESSION['name'] = $name;
        $_SESSION['number'] = $number;

        // Перенаправление на страницу about.php
        header('Location: about.php');
        exit;
    } else {
        echo 'Ошибка при отправке сообщения: ' . $mail->ErrorInfo;
    }
}
?>