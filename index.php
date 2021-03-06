<? /*
-------------------------------------- №1 - №2 ------------------------------------

СЕРВЕР - программа (не железо), Его задача принять, отдать. Аналог с магазином.
Машина одновременно может быть и сервером и клиентом.

была придумана система OSI:
- Прикладная (http, smtp)
- Представительная (xml, smb)
- Сеансовый (tls, ssl, netbios)
- Транспортный (tcp, udp)
- Сетевой (ip, icmp)
- Канальный (ethernet, wifi)
- Физический (электричество)

Но она костыльная, была придумана когда все уже заработало. Уровни перепутаны меж собой.

ПРОТОКОЛ - правил дорожного движения.

Чтобы коммуницировать придумали ip адреса и их объединяют в подсети используя маски сети.
Способ связи в своей сети и с другой сетью отличается, поэтому также используется маска сети.
	маска сети
	255.255.255.0
		IP адреса
		213.180.204.8 - благодаря маске здесь есть адрес сети и адрес компа.

Полезная команда
ipconfig /all       - инфо о сетевых подключениях.

DHCP-сервер - сервер раздает ip адреса.
MAC-адрес - физический адрес, нужен только для коммуникацции только в локальной сети
Маршрутизатор, шлюз - с одной стороны в одна сеть, с другой стороны - другая

Одна машина может устанавливать много соединений ПАРАЛЛЕЛЬНО (используя порты)

Порт - это число(виртуальное, физически его нет, как добавочный телефон).
Поэтому содинение устанавливается не только по IP, но и по порту
Сокет - ip+port.

Маршрутизатор - который между двумя сетями, Используя систему NAT -  просто сопоставляет IP и порт одной сети, IP и порт другой сети.


Полезная команда
ping ya.ru      - посылает по стандарту 4 пакета на конечную машину. - Проверка маршрута. (пинг до роутера, пинг до провайдера.)
tracert ya.ru   - тоже проверка маршрута


Общение на более высоком уровне проискходит при помощи служб интернета.
ftp-сервер - ftp-сервер, ftp-клиент общаются по ftp правилам (протоколу)
www-служба - web-сервер, web-клиент(браузер) общаются по http правилам.
dns-служба - dns-сервер.
Службы по умолчанию прослушивают определенные порты (www-80,ftp-21)

Полезная команда
netstat -ano - просмотреть занятые порты , скрин.
Утилита TCPView - можно в реальном времени посмотреть порты (Утилиты Марка Руссиновича)


dns-служба - сопоставляет ip адрес с названием. Делится на домменные уровни. Все кешируется.
Помимо этого все кешируется и в операционной системе!!

файл hosts - в операционной системе можно задать днс запись.

Полезная команда
ipconfig /displaydns - закеширование днс в операционной сиситеме.
nslookup ya.ru - узнать адрес ya.ru



-------------------------------------- №3 - №4 ------------------------------------


После устновления соединения, послыаются запросы.

Клиент посылает запрос

		Строка запроса
		GET /folder/index.html HTTP/1.1

		Заголовки запроса ( предназначены серверу и разработчику)
		Host: mysite.ru /n/r (обязательный заголовок)
		User-Agent: Mozilla/5.0 /n/r
		...
		/n/r - пустая строка, последний заголовок

		Под каждый заголовок заводится переменная с префиксом HTTP (HTTP_USER_AGENT)


Сервер отвечает

		Строка ответа
		HTTP/1.1 200 OK

		Заголовки ответа (сервер дает четкие указания)
		Date: Sun,14 Aug 2016 /n/r
		Content-Length: 34354
		Content-Type:text/html
		/n/r - последний заголовок
        тело ответа

		Статусы - они декларативны ( 200, 404, .. просто для информации, можем сами послать другим статусом ).
		1** -
		2** - успешное выполнение
		3** - переадресация
		4** - ошибка на стороне клиента
		5** - ошибка на стороне сервера



Данные от клиента получаем при помощи форм.

		GET /folder/index.html?login=Vasia&pwd=parol HTTP/1.1
		GET-запрос - строка запроса длиная, не безопасно.
		Строка запроса - дай адрес с доп параметрами login=Vasia&pwd=parol


		POST /action HTTP/1.1
		POST-запрос - доп параметры передаются в теле запроса.
		имеет свои POST заголовки
		Referer - кто запросил
		content-length - длина
		content-type - тип(например, что отправил именно форма)


		Для хранения состояния используются куки.
		Используется заголовки Set-Cookie и Cookie.


Серверы по популярности:
		Apache
		nginx
		Microsoft
		Google



-------------------------------------- №5-6 ------------------------------------


Apache     - Исторически сложилось, стал популярнее. Бесплатный, на хостинге (расшариемость) используется.
Есть еще IIS - майкросовтовское, менее популярное.

Версии. Версии выпускаются редко, из-зи поддержки.
Apache 1.3 - существовало очень долго.
Apache 2.4 - перешли, сказали все отказываемся от более ранних версий.


Основные директории
	bin     - испольняемые файлы, утилиты
			httpd.exe - главный файл, который мы будем запускать.

	modules - расширения, модули. Подключаем или отключаем необхоимые модули.
	conf    - конфигурация
			httpd.conf - самая главная настройка сервера. Здесь находятся основные настройки.
			папка extra - здесь допполнительные настройки, которые подключаем из основного httpd.conf

Первым делом меняем корень, куда распаковали appache - httpd.conf
	ServerRoot(40строка)
	DocumentRoot(256строка)
	<directory(257строка)

ЗАПУСК

Управление сервером
1) из командной строки, переходим в папку bin (cd bin), команду httpd (ctrl+c - остановить). Это просто посмотреть на базовом уровне.
2) запускаем как службу Windows.

	из командной строки (в режиме администратора), переходим в папку bin (cd bin),
	команду  httpd -k install    - зарегистрировать как службу
			httpd -k uninstall  - удалить службу

			net start apache2.4 - запуск из командной строки
			net stop apache2.4 - останавливаем из командной строки

			httpd -k start  - запуск из командной строки
			httpd -k stop  - останавливаем из командной строки
			httpd -k restart  - рестарт из командной строки

	пуск->поиск "администрирвание"->службы
		Переводим запуск службы вручную.
		можно здесь запускать и останавливать службу.

	!!!! Так как httpd.conf зачитывается при старте. После изменения файла нам постоянно придется перезапускать сервер. !!!!
		Для этого есть удобный инструмент - bin/AppacheMonitor.exe.
		Если при перезапуске appache не перезагружается и есть ошибка, из командной строки, переходим в папку bin (cd bin), команду httpd -k start
		(сообщение об ошибке)

	!! и для того чтобы каждый раз не переходить в папку bin, добавим путь в системную переменную

	пуск->поиск "Система"->Дополнительные параметры системы->переменные среды->Системные переменные->изменить.
	Создаем переменную с путем C:\Users\e.nikolaev\Apache24\bin


		httpd.conf - правила конфигурации

			# комментарий

			# Однострочные директивы(глобальные)
			ИмяДирективы Значение [значение...]

			# Блочные директивы (только на этот блок, например для папки)
			<ИмяДирективы Значение>
			ИмяДирективы значение
			</ИмяДирективы>



		----  ОСНОВНЫЕ ДИРЕКТИВЫ  ----

		ServerRoot                  - корень сервера, Apache в путях понимает слеши и так\ и так/
		Listen 80                   - какой порт слушать
		LoadModule имя путь          - подгрузить модуль
		ServerAdmin mail            - при ошибке 500, используется mail
		DocumentRoot                - корневая папка (сайта)
				<Directory ' путь DocumentRoot'>       - настройки только для этой папки
					Required ( all granted |all denied )       - кого пускать в эту директорию (all denied - закрываем доступ)
					AllowOverride ( None | All)                - важная диреторрия для хостующихся, all - разрешает использование .htaccess - дополнение к httpd.conf
					Options ( Indexes | -Indexes)              - паказать содержимое папки
					DirectoryIndexes
				</Directory>


		<IfModule dir_module>
			DirectoryIndex index.html                   - индексный файл
		</IfModule>

		Include conf/extra/httpd-autoindex.conf    - более красивый показ содержимого каталога
													Можно задать служебные файлы для красивого показа содержимого каталога в файле httpd-autoindex.conf
															readme.html  - снизу
															header.html  - сверху

		IndexIgnore  *.php                          - не показывать файлы в содержимом каталоге


		----  РЕДИРЕКТЫ  ----
			Redirect 301 "/old" "http://site.ru/new/"
			Редиректы постоянно кешируются, чтобы не чистить постоянно кеш в браузере ставим: network->disable cashe
			Редиректит со статусом  302 - это для поисковиков, данный переехал временно, скорее вернется обратно. Из индекса поисковика удалять не нужно.
		                         301 - перехал навсегда, говорит поисковику, удали из своего индекса старый адрес
	                             303 -
	                             410 - удален(мертвый адрес), не указываем 3 аргумент.


		----  ЖУРНАЛИРОВАНИЕ  ----
			Не все директивы можно менять в .htaccess.
			logs - здесь логи.

            Директивы в httpd.conf:
				Журнал ошибок сервера
					ErrorLog "logs/error.log" (это серверные, мало инфоравтивные для нас, запустился или нет)

				Журналы с данными запросов
					CustomLog "logs/access.log" common  - свой лог с меткой common (записываются запросы и ответы)
					CustomLog "logs/agents.log" agent
					CustomLog "logs/refs.log" referer

				Формат Записи данных для журналов
					LogFormat "%h %t %r %>s %b" common  - формат записи для метки common
					LogFormat "%{User-Agent}i" agent
					LogFormat "%{Referer}i" referer



 -------------------------------------- №7 ------------------------------------

	 Виртуальные хосты (Облако) -  связь , то есть к папке на сервере можно обратиться по такому IP-адресу.
		Для этого, все настроки делаем внутри директивы VirtualHost
	        <VirtualHost ip:port>
	            # Описание Виртуального хоста(где находится папка и т.д.)
	        </VirtualHost>

			По порту (	<VirtualHost *:8001>	<VirtualHost *:8002>  )

            По ip   (  <VirtualHost 192.168.1.1:80>   <VirtualHost 192.168.1.2:80>  )

			По имени  (  Золотая середина, на один ip, на один порт, но разное имя  )
				<VirtualHost *:80>
                    ServerName site.ru
                </VirtualHost>


			Пример:
               <VirtualHost 127.0.0.1:80>
				    #Имя сервера
				    ServerName mysite.local
				    ServerAlias supersite.ru

				    #Администратор
				    ServerAdmin admin@site.ru

				     #корень сервера
				     DocumentRoot 'C:\Users\e.nikolaev\Apache24\mysite\htdocs'

				    #Настройка папки
				    <Directory 'C:\Users\e.nikolaev\Apache24\mysite\htdocs'>
				        Options +Indexes FollowSymlinks
				        AllowOverride All
				        Require all granted
				    </Directory>
				 </VirtualHost>


			Виртуальные папки (как ярлык)
	                Alias '/info' 'c:/users/folder/vasya/folder'
	                Alias '/info/' 'c:/users/folder/vasya/folder/' (без слеша по этому пути не попадешь)
	                Обязательно описать директорию!

			Сообщения об ошибках
			ErrorDocument статус страница
			ErrorDocument 403 /errors/page403.html



-------------------------------------- №8 ------------------------------------
	Регулярные выражения

		<FilesMatch "\.(zip|rar)$" >
		 RedirectMatch 301 "/(.*)\.html" "http://mysite.local/$1.php"

		Модификаторы
			.    любой одиночный символ
		    []   класс символов, один из
		    [^]  класс символов, ни один из
		    a|b  или

	    Квантификаторы
	        {n,m}   от n до m
	        {n,}    от n до бесконечности
	        {n}     точно n
	         ?      0 или 1
			+       от 1 до бесконечности
			*       от 0 до бесконечности



		----  Модуль mod_rewrite  ----
			LoadModule rewrite_module modules/mod_rewrite.so
            Options +Indexes FollowSymlinks   - должен быть FollowSymlinks для корректной работы модуля
            Разруливает ЧПУ. Он преобразует(подменяет)   news/20018/03/11  в  ?cat=news&year=2018&mon=03

			Использование модуля mod_rewrite
                RewriteEngine On - используем модуль в папке (пропускай запросы через mod_rewrite)

			Правила модуля
				RewriteRule Шаблон Замена/Подстановка [Флаги]
			Флаги
                NC - не учитывать регистр
                OR - либо следующее условие
				L - последнее правило (дальше RewriteRule не работают)
				R - перенаправление      (! Для отладки, по умолчанию не редиректит.)
				F - возвращает статус 403
				G - возвращает статус 410


				RewriteEngine On
				RewriteRule     ^([a-z]+)/(\d{4})/(\d{1,2})/(\d{1,2})/?$     /test.php?cat=$1&year=$2&mon=$3$day=$4       [R] - отредиректит на test.php?...


				Условия модуля
                    RewriteCond Тест  Условие [Флаги]



                 https://www.youtube.com/watch?v=tXsCW6simLE&list=PLqQ1VsG-wgxdLJhiYs00OgTtBQJ4G_WXx&index=1&ab_channel=%D0%94%D0%BC%D0%B8%D1%82%D1%80%D0%B8%D0%B9%D0%A2%D1%80%D0%B5%D0%BF%D0%B0%D1%87%D1%91%D0%B2

						  ------------------------- 1-5 ---------------------------------

								RewriteEngine On
								RewriteBase /

								редирект из dir на test.html
									 RewriteRule ^dir/$ test.html [R]

								отрицание регулярки, в php отрицания нет
								    RewriteRule !test1\.php index.html



								RewriteCond добавляет дополнительные условия применяемые к RewriteRule
								Кидай все запросы на index.html но с уточнением выше %{REQUEST_URI} - часть url с начальным слешем
								RewriteCond работает с начальным слешем,   RewriteRule работает без начального слеша
								RewriteCond действует только на RewriteRule который ниже
								Когда несколько RewriteCond работает как логическое И

									RewriteCond %{REQUEST_URI} \.php$
									RewriteCond %{REQUEST_URI} ^/dir/
									RewriteRule .+ index.html




						  ------------------------- 6 ---------------------------------
								Или php или html
									RewriteCond %{REQUEST_URI} \.(php|html)$
									RewriteRule .+ index.html

								Сработает как логическое И , если поставить флаг [OR] сработает как логическое ИЛИ
									RewriteCond %{REQUEST_URI} \.jpg [OR]
									RewriteCond %{REQUEST_URI} \.php
									RewriteRule .+  index.html



						  ------------------------- 7 ---------------------------------
								Работа с флагами f,d,s в директиве RewriteCond (файлы и папки)

								Если есть файл, редиректи на index.html
								-s       - файл не нулевого размера
								!-f      - не существующий файл
										RewriteCond %{REQUEST_FILENAME} -f

								Если есть папка, редиректи на index.html
									RewriteCond %{REQUEST_FILENAME} -d
									RewriteRule .+  index.html


						  ------------------------- 8 ---------------------------------
							 Как работает RewriteRule
							 !!!!!!  8 видео если не понятно пересмотреть !!!!!
							 !!!!!!  Все RewriteRule выполняются по очереди сверху вниз. После опять заново все по очереди до тех пор пока адрес перестает изменяться. !!!!!!!
							 !!!!!!  Сервер сравнивает, Если предыдущий запрос закончился на этом и этот запрос закончился на этом то все, прекращаю редиректить.       !!!!
							 флаг L - последнее правило (дальше RewriteRule не работают, но файл зачитывается заново )
							 !!! При этом и отладки нет !!!
							 будет get = 2 , при повторном проходе , стоит флаг L
								RewriteRule ^index\.php$ index.php?get=2 [L]
								RewriteRule .+ index.php?get=1


							 !!! Лучше граничные случаи разграничивать, то есть при страться учитывать, чтобы при повторном выполнении, захода в RewriteRule не было !!!!
							 без RewriteCond будет зацикливание, отменяем повторное выполнение
								RewriteCond %{REQUEST_URI} !^/test/
								RewriteRule (.+) test/$1


						  ------------------------- 9 ---------------------------------
							 Получение запрошенного в карман
							 get парамтры в кармане не передаются, и в RewriteCond тоже не передаются
								RewriteCond %{REQUEST_URI} !^/index\.php$
								RewriteRule (.+) index.php?get=$1 # все без начальных слешей

							 RewriteCond тоже имеет карманы
							 и чтобы к ним обратиться в RewriteRule нужно использовать '%'
								RewriteCond %{REQUEST_URI} !^/index\.php$
								RewriteCond %{REQUEST_URI} (.+)
								RewriteRule (.+) index.php?get=$1&cond=%1

							 NC - флаг для RewriteRule для регистронезависимости
							 ErrorDocument 404 /404.php - можно указать страница ошибки






-------------------------------------- №9 ------------------------------------

			Базовая аутентификация
            !!! Преднаначена только для браузера и только для сервера.
			Работает на уровне заголовков.

            Создание учетной записи
            .htpasswd (хранится  в каждой строке login:passwd - admin:$apr1$uPcyl62w$.Y0WeLZ.LvRUAMbbSh369/)
			при помощи утилиты htpasswd.exe:(либо при помощи генератора в инете)
                    htpasswd  -c   путь   имя_пользователя     (при первой записи и при создании ставим флаг -c)
                    htpasswd    путь   имя_пользователя


			И в htaccess  добавляем настройки
                Стандартные:
		           Пример:
					AuthType Basic                                                          -  Тип аутентфикации
					AuthName "Запретная зона"                                                 -  Строка сообщения
					AuthUserFile C:\Users\e.nikolaev\Apache24\mysite\htdocs\.htpasswd       -  Файл с паролями. ПОлный физический путь
					Require valid-user                                                      -  Включение защиты


				Дополнительно:
	                Допуск конкретных пользователей
	                    Require user admin vasya
					Файл групп пользователей
	                    AuthGroupFile 'c:/secure/.htgroup'
	                Допуск пользователей группы
	                    Require group admins manager


               Базовую аутентификацию можно обернуть для определенных файлов
                    <FilesMatch "\.(zip|rar)$">
		                    AuthType Basic
							AuthName "Запретная зона"
							AuthUserFile C:\Users\e.nikolaev\Apache24\mysite\htdocs\.htpasswd
							Require valid-user
                    <FilesMatch>


				---- Защита трафика [ssl-tls] -----
	                    при передаче все шифруется, и заголовки и данные, кроме get-параметров.
	                    Оба ( A и B ) должны использовать одинаковую криптографию с открытым и приватным ключом.
						A берет, шифрует сообщение с помощью открытого ключа, B получает данные и расшифровывает с помощью закрытого ключа.
	                    При этом должен быть еще тренд (T) - доверенное лицо.Ему все доверяют. У них у обоих  есть общий ключ с T (ключ с TA и ключ с TB).
	                    Чтобы точно знать от A общается с B. То есть письмо оборачивается два раза ключом A и ключом T , и посылается T для проверки.
	                    T распаковывает, сверяет с общим ключом (TA и добавляет чтобы можно было распаковать  c TB ) и отправляет A что это именно A посылает сообщение.
	                    B принимает, распаковывает все, сверяясь с общим ключом(TB) и своим привытным ключом.
	                    Так работает https-протокол.
                        В роли T выступают доверенные центры, которые раздают сертификаты.
						Сертификаты бывают:
                        Доверенные(как через ностариуса, стоит денег)
                        Самоподписанные(как доверненность от руки)

							(не проделал)
						 1) создание самописного сертификата
							>cd conf
							>openssl.exe
							OpenSSL>req -config openssl.cnf -new -out mysite.csr
							OpenSSL>rsa -in privkey.pem -out mysite.key
							OpenSSL>x509 -in mysite.csr -out mysite.cert -req -signkey mysite.key -days 365

						2) Load module ssl_module_modules/mod_ssl.so

						3) </VirtualHost 127.0.0.1:443>
							SSLEngine On
							SSLCertificateFile ../ssl/mysite.cert
							SSLCertificateFile ../ssl/mysite.key




 -------------------------------------- №9 ------------------------------------

						Типы MIME:
							/comf/mime.types           - путь , Глобавльный список MIME-типов
							DefaultType text/plain     - тип по умолчанию+
							AddType text/xml .html - Добавление нового расширения файлов (Команда браузеру, когда придет файл html, отобрази как xml)


						Кастомные заголовки
	                        Модуль для всех заголовков ответа
	                        LoadModule headers_module modules/mod_headers.so
							Модуль для всех заголовков Expires
	                        LoadModule expires_module modules/mod_expires.so

	                        Header set X-My-Header 'Value'  (Установить, принято с X-...)
	                        Header unset X-My-Header        (удалить)



						Управление кеширвоанием ресурсов
							 Запрет кеширование
								 Header set Cache-Control 'no-cache' (не кешировать на диске)
								 Header set Cache-Control 'no-store' (не кешировать в оперативной памяти)
								 Header set Cache-Control 'private, no-cache, must-revalidate'
	                             ExpiresActive On
	                             ExpiresDefault 'now'
                            Разрешение кеширования
								 Header set Cache-Control 'public,max-age=600'   ( Кешируй в секундах от текущей даты )

								 ExpiresActive On                                   ( Этот заголовок, позволяет задавать ExpiresDefault, где обычной строкой задаем время кеширвоания)
								 ExpiresDefault 'access plus 2 days'                ( текущая дата(access) + 2 дня )
								 ExpiresDefault 'modification plus 3 hours'             ( дата изменения файла(modification) + 3 часа )
                                 Кеширование по типу ресурсов
								 ExpiresByType text/html 'access plus 2 days'    (кешируй text/html текущая дата(access) + 2 дня)
								 ExpiresByType image/gif 'access plus 2 weeks'



						Привязка серверных обработчиков
                            CGI ( выполняется как исполняемые фалы (как exe), и так как они небезопасны все cgi-скрипты кидаем в одну папку, указывая ScriptAlias )
                                ScriptAlias "/cgi-bin/" "/www/cgi-bin/"
                                AddHandler cgi .cgi .pl


                            Модуль
                                LoadModule php5_module "/PHP/php5apache2_2.dll"
                                AddType application/x-httpd-php .php


							 SSI
							    Options _Includes
							    AddOutputFilter Icludes .shtml
							    AddType text/html .shtml



									Пример      https://resource-gsv.ru/webserver/download.html
												https://resource-gsv.ru/webserver/connect-php-in-apache.html
												Скачаем php, и httpd.conf:
													Раскомментируем
														LoadModule negotiation_module modules/mod_negotiation.so
														LoadModule rewrite_module modules/mod_rewrite.so
														LoadModule setenvif_module modules/mod_setenvif.so

													Добавим
														PhpIniDir "C:\Users\e.nikolaev\Downloads\php-7.4.11-Win32-vc15-x64"
														LoadModule php7_module "C:\Users\e.nikolaev\Downloads\php-7.4.11-Win32-vc15-x64/php7apache2_4.dll"
														AddHandler application/x-httpd-php .php

														<IfModule dir_module>
												            DirectoryIndex index.html index.php
														</IfModule>
														И настраиваем php.ini






 -------------------------------------- №12 ------------------------------------

                    веб сервер nginx (nginx.org)
				    Apache немного тяжелее, каждый раз зачитывает .htaccess.
				    Задача была сделать быстрый веб-сервер. Уго не используют для хостинга, у него один кофигурационный файл, который доступен только для администратора.
				    !!!!Первая задача - служить выделенным сервером, сам рулю своим сервером (хостить не получится, то есть раздавать папки)!!!!



						Основные папки (структура похожа)
                            nginx.exe - основной файл
				            html - аналог htdocs (apache)
							conf - настройки
                                nginx.conf - основной файл конфиугурации
								mime.types - типы mime


					 Управление сервером
                        nginx.exe - запуск
                    Управление запущенным сервером, 	из командной строки, переходим в папку nginx
                        nginx -s stop     - останавливает полностью
                        nginx -s quit     - как закрывающийся магазин, ни кого больше не впускает
                        nginx -s reload   - перезагрузачитай конфигурационный файл, при этом сам сервер работает.



					Правила конфигурации nginx.conf похожи на apache, но слегка отличаются
						#  - однострочный комментарий
	                    ИмяДирективы значение [значение2 ...];  - однострочная директива (; - ставим!)

                        Блочная директива
						ИмяДирективы [значение]{
							ИмяДирективы значение
                        }

						!Физические пути прописываются (OC Windows) прописываются с прямым слешем  - C:/Users/e.nikolaev/nginx




         -----------------  Основные директивы ---------------------
                            http - главая глобальная дирктива.

							 error_log logs/error.log           - логи nginx
							 access_log logs/access.log main    - пользовательские логи (common_log в apache), main - метка
                             log_format main '$remote_addr - [$time_local] "$request"'

							 Подключение файлов
							 include mime.types

							 Доступ
							 deny all
							 allow 127.0.01

							 Документы
							 root document_root             - корневая папка сайта
							 index index.html index.htm     - (directoryIndex в apache)
							 autoindex off                  - (Option Indexes в apache)
							 default_type application/octet-stream  - (DefaultType по умолчанию в apache)

							 Файлы ошибок
                             error_page 404 /404.html

                             Заголовки
                             add_header Cache-Control no-store
                             expires 24h
                             expires modified +24h







       ----------------- Настрока виртуального хоста, директива server ---------------------
                        !!! Здесь все работает не относительно папок, а относительно запроса . За это дело отвечает location !!!!

						    server {
						        listen       80; #127.0.0.1
						        server_name  localhost;

                                #обращение к корню
						        location / {
						            root   www;                   - корневая папка
						            index  index.html index.htm;  - индексный файл
						        }

                                # ошибки, можно указать сразу несколько
								error_page   500 502 503 504  /50x.html;


                                #обращение к /foo/
						        location /foo/ {
						            alias /some/path/;     - ссылка на папку
						        }


                                #перенаправления
						        location /bar/ {
						            rewrite ^(.*)$ http://site.com permanent #301;     (для 302 - используем redirect, для 301 - используем permanent)
						        }
                                location /deleted.html {
						            return 410;             (вернем 410 статус)
						        }


								#можно делать сложные перенаправления
								location /file.html {

                                        #разбираем get-параметры,  /file.html?lock=1&abc=2
										# ~ говорит, что будет сравниваться с регуляркой, а не строкой
											if($query_string ~ ^lock=1){
											    return 403;
											 }

                                        #под каждый get-параметр заводится переменная, $arg_...   ( в нашем случае $arg_lock и $arg_abc)
											if($arg_lock ~ "0"){
											    return 402;
											 }
						        }
						    }




         ----------------- Описание директорий ---------------------
							(порядок 40 мин)

                         location = / {
						    # = / точное совпадение
						 }

						location / {
						    # означает /..что-то еще
						 }

						location /documents/ {
						    # означает /documents/..что-то еще
						 }

						location ~ *\.(gif|jpg)$ {
						    # ~ - означает регулярное выражение
						 }


						location ^~ /images/ {
						    # ^~  - не должно проверяться на регулярное выражение
                            # даже если попадется в других выражения, не надо его применять, напимер /images/1.gif
						 }


						перенаправление с меткой (если будет 405 статус, перенаправь его с 200 на метку @dir)
	                        error_page 405 - 200 @dir
	                        location @dir{
								root /some_root
	                        }




 -------------------------------------- №11 ------------------------------------
			!!! Вторая задача, отдача статики.
			 Разделяем на apache ставим скрипты, а на статику nginx, чтобы отдавало быстрее. Ставим мордой nginx, за ним apache.
			 В nginx прописываем, если это картики, стили и тд, то переходи в папку и забирай. А если это php , передавай apache.


						 server {
						    listen       80;
						    server_name  localhost;

							 #если статика
						    location ~\.(jpg|png|css|js) {
						        root   C:/Users/e.nikolaev/Apache24/mysite/htdocs;   - переходи в папку и забирай
								index  index.html index.htm;
						    }


						    #если не статика
						    location / {
						       proxy_pass http://127.0.0.1:81;     - этого должно хватить, но нужно еще прокинуть заголовки пользователя (так как nginx обращается к apache)
                                                                        (также меняем в настройках apache порт, document-root)
						        proxy_set_header Host $host;                       - перезапиши заголовок host
						        proxy_set_header X-Real-IP $remote_addr;           - добавь заголовок remote_addr пользователя, т.к nginx тоже передает заголовок remote_addr
						        proxy_set_header X-Forwarded-For $remote_addr;     - добавь заголовок remote_addr пользователя, т.к nginx тоже передает заголовок remote_addr
						    }
						}




            !!! Третья задача,  использование nginx как балансировщик нагрузки.
                Стоит nginx , а за ним несколько apache. nginx разруливает какому apache обратиться.

						apache - метка, название может быть любым.
				        weight - просто число, где выше, тот и приоритетнее.
					        upstream apache{
								server 127.0.0.1:81 weight=5;
								server 127.0.0.1:82;
								server 127.0.0.1:83;
								server 127.0.0.1:84 down;
							}
							server {
							    listen       80;
							    server_name  mysite.local;
							    location / {
							       proxy_pass http://apache;  - прописываем имя метки
							        proxy_set_header Host $host;
							        proxy_set_header X-Real-IP $remote_addr;
							        proxy_set_header X-Forwarded-For $remote_addr;
							    }
							}




  -------------------------------------- Битрикс виртуальная машина ------------------------------------

                /var/log/ здесь логи

				Команды используемые на CentOS
					Apache:
				    service httpd restart (start| stop)
					systemctl start httpd.service
					systemctl stop httpd.service
					systemctl restart httpd.service

					nginx:
					service nginx reload (restart | start| stop )
					systemctl reload nginx
					systemctl start nginx
					systemctl stop nginx

                    Конфиурационные файлы
					https://www.acrit-studio.ru/technical-support/configuring-the-module-export-on-trade-portals/server-configuration-BitrixVM/
                    https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=32&LESSON_ID=11783



					установка node js на сервер (можно сразу под битриксом)
					https://stackoverflow.com/questions/55057898/npm-command-not-found-centos-7
					https://timeweb.com/ru/community/articles/kak-ustanovit-node-js-na-server-s-linux



*/