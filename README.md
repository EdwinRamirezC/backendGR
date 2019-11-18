# Instalación

Este repositorio corresponde al Backend desarrollado en Laravel, encargado de proveer los servicios web necesarios para consultar Tweets atreves del API de Twitter, guardar las valoraciones que el usuario designe en una base de datos creada en MySql y consultar los Tweets valorados.
Para su instalación se procederá de la siguiente manera

1.	Descargar o clonar el repositorio https://github.com/EdwinRamirezC/backendGR.git
2.	Una vez descargadas las fuentes, proceder a instalar las dependencias por medio del comando
        -composer install
3.	Se debe disponer de una instancia de base de datos MySQL y crear una base de datos; el nombre es opcional, pero para efectos de la instalación la llamaremos 'pruebagr'
4.	Se deben configurar las credenciales de la instancia de base de datos MySQL en el archivo. env de configuración de Laravel quedando algo similar a la siguiente configuración
        
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=pruebagr
        DB_USERNAME=root
        DB_PASSWORD=

Donde dependiendo de la instancia MySQl dichas credenciales pueden variar.

5.	Una vez configurado Laravel con MySQL, se deberán correr las respectivas migraciones que crearán las tablas necesarias para el correcto funcionamiento de los servicios web, para ello usaremos el comando 
    -php artisan migrate
6.	Siendo satisfactorios los pasos anteriores solo nos queda correr el servidor que trae integrado Laravel, para ello utilizaremos el comando 
    -php artisan serve

Una vez terminados los pasos anteriores quedara listo nuestro servicio web y estará disponible para recibir las peticiones entrantes del Fontend ubicado en el repositorio 
https://github.com/EdwinRamirezC/frontendGR.git


