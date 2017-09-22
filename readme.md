
- Необходимо реализовать сервис вывода ленты Twitter с обновлением в реальном времени.

  Требования:
    - обязательное наличие composer.
    - реализация на "чистом" PHP.
    - вывод не более 25 последних сообщений.
    - реализация фронтенд произвольная (jQuery, Angular, React).
    - архитектура должна предусматривать подключение других новостных лент (другие системы).


Информация по приложению: 
   
   Для запуска необходимо: 
   - установить все для работы php и apache
   - скачать composer.phar
   - composer.phar install
   - создать конфиг app/config/parameters.php если нужно заменять данные пользователя такого вида:
<pre>
return [
    '%twitter_key%' => '',
    '%twitter_secret%' => '',
    '%twitter_oauth_token%' => '',
    '%twitter_oauth_token_secret%' => '',
];
</pre>
  - htaccess уже настроен на переброс на директорию web
  - код пишем в src/feed
  - как минимум нужен клиент и средство аутентификации и забора данных, в моем примере это Twitter и ahbaram/twitteroauth
  - если нужно пробросить aouth клиент соединение с параметрами из конфига - смотрим тестовый вариант, в Twitter 
  уже включен $oauth, который создался из конфига в app/config.php
  - нужно выдать результат в клиенте - массив сообщений, адаптированный для ответа на фронт,
   обязательные поля у сообщения - id, text, date
  - если отсутстует часть конфигурации - приложение постарается ругнуться и написать чего не так.
  