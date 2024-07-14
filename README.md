
## Описаниие docker среды

- Nginx 1.27.0
- PHP 8.2
- MySQL 8.0

## Установка зависимостей

Для загрузки пакетов необходимо установить [Composer](https://getcomposer.org/)

Выполните команду:

``composer install``

## Запуск

Для запуска выполните команду:

```docker-compose up -d```

В результате запустится 4 контейнера: nginx, php и два контейнера MySQL (master и  slave). 

На master и slave импортируется данные об автомобилях data.sql.

Для получения всех записей из таблицы Car:

``http://localhost/api/cars``
