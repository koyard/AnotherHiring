План работ
-
+ Развернуть Yii2 - 1 час. (LAMP у меня уже есть)
+ Загрузка файлов - 1 час.
+ + Миграции, AR - 20 минут
+ + Загрузка - 20 минут
+ + Парсинг - 20 минут
+ Отображение сводной таблицы - 1 час.
+ Отображение информации о файле - 30 минут.

Всего: 3 часа 30 минут.

Итог
-
+ Развернуть Yii2 - 21 минута
+ Загрузка файлов - 3 часа 42 минуты.
+ + Миграции, AR - 27 минут
+ + Загрузка - 1 час 2 минуты
+ + Парсинг - 2 часа 13 минут
+ Отображение сводной таблицы - 1 час.
+ Отображение информации о файле - 36 минут.
+ Добавить порядковый номер к списку файлов - 8 минут
+ Добавить счетчик больших файлов - 45 минут

Всего 6 часов 31 минута.

Инструкция по установке приложения
=
Эти действия небходимо выполнять в терминале.
-
1. Создайте директорию в которой будет размещено приложение.
`mkdir application`
2. Перейдите в эту директорию.
`cd application`
3. Склонируте репозиторий с исходными кодами приложения.
`git clone https://github.com/koyard/AnotherHiring.git --branch master .`
4. Запустите установку зависимостей приложения.
`composer update`
5. Создайте базу данных для приложения.
`php yii migrate`
6. Запустите приложение.
`php yii serve`

Откройте эту страницу в вашем браузере
-
[http://localhost:8080/index.php?r=site%2Fupload](http://localhost:8080/index.php?r=site%2Fupload)
