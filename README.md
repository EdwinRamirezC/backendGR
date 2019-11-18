##Instalacion

Este repositorio corresponde al backend desarrollado en laravel, encargado de proveer los servicios web necesarios para
consultar Tweets atravez del API de Twitter, guardar las valoraciones que el usuario designe en una base de datos creada en MySql
y consultar los Tweets valorados.

para su instalacion se procedera de la siguiente manera

1)  Descargar o clonar el repositorio https://github.com/EdwinRamirezC/backendGR.git
2)  Una vez descargadas las fuentes, proceder a instalar las dependencias por medio del comando 
        -composer install
3)  Se debe disponer de una instancia de base de datos MySQL y crear una base de datos; el nombre es opcional pero para efectos de la instalacion la llamaremos 'pruebagr'
4)  Se deben configurar las credenciales de la instancia de base de datos MySQL en el archivo .env de configuracion de Laravel quedando algo similar a la siguiente configuracion
        
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=pruebagr
        DB_USERNAME=root
        DB_PASSWORD=

    Donde dependiendo de la instancia MySQl dichas credenciales pueden variar. 

5)  Una vez configurado Laravel con MySQL, se deberan correr las respectivas migraciones que crearan las tablas necesarias para el correcto funcionamiento de los web services, para        ello usaremos el comando
        -php artisan migrate
6)  Siendo satisfactorios los pasos anteriores solo nos queda correr el servidor que trae integrado Laravel, para ello utilizaremos el comando
        -php artisan serve

Una vez terminados los pasos anteriore quedara listo nuestro servicio web y estara disponible para recibir las peticiones entrantes del fontend ubicado en el repositorio 
https://github.com/EdwinRamirezC/frontendGR.git
