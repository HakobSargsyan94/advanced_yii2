I use the Yii2 basic .

For use project you need to do git clone after that run the composer update .

Required php 7.4 >= , MySQL 10.*

I used the OpenServer . 

For get token you need to use in your console "php yii get-token" after than you must fill the username and password 

For registration you must sigh-up in project

Use token  in api for example Postman Api key authorization

for insert json in Database you must request GET/POST to 

GET => <your_domain>/frontend/insert?<json>

POST => <your_domain>/frontend/insert in body raw data (json)

i sent your HR postman api documentation


For view part you must go to <your_domain>/data/index


<table style="width: 100%">
    <thead>
        <tr>
            <th>Задача</th>
            <th>Оценка</th>
            <th>Затрачено</th>
            <th>Комментарий</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Настройка окружения</td>
            <td>20 минут</td>
            <td>20 минут</td>
            <td>Знаю наизусть</td>
        </tr>
        <tr>
            <td>Установка фреймворка</td>
            <td>10 минут</td>
            <td>10 минут</td>
            <td>Знаю наизусть</td>
        </tr>
        <tr>
            <td>Скрипт авторизации в console-части</td>
            <td>1 час</td>
            <td>50 минут</td>
            <td>Разработал все сам гуглил только прием данных в php</td>
        </tr>
        <tr>
            <td>Скрипт во frontend-части (поддержка GET, POST)</td>
            <td>1 час</td>
            <td>1 час</td>
            <td>Все сделал сам потому что опыт большой в Апи</td>
        </tr>
        <tr>
            <td>CRUD (без CREATE) в backend-части</td>
            <td>50 мин</td>
            <td>1 час</td>
            <td>Длилось больше предполагаемого потому что искал нормальную вюшку для отображанеия json-а</td>
        </tr>
    </tbody>
</table>