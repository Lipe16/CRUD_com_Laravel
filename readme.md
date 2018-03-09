**PROJETO PHP USANDO LARAVEL MVC**

Laravel é um framework PHP que facilita e muito a vida do programador:



1. Divide o projeto em camadas com MVC;
2. Diminui o uso de tarefas repetitivas;
3. Tem bastante documentação;
4. Tem uma engine de template que facilita criação de views;
5. Na model usa o framework enloquente, é um framework ORM como hibernate do Java;
6. Tem o comando 'php artisan' para criar automaticamente as classes de Model, View ou Control.

Neste projeto com laravel, fiz um CRUD para poder fazer uso de vários dos recursos citados a cima


Criei um alias no meu servidor apache(uso o xampp):

    Alias /laravelCRUD "C:/xampp/htdocs/laravelCRUD/CRUD/public/"
    <Directory "C:/xampp/htdocs/laravelCRUD/CRUD/public">
	    Options Indexes FollowSymLinks Includes ExecCGI
	    AllowOverride All
	    Require all granted
    </Directory>
    
Coloquei a linha RewriteBase no .htacces do laravel (localizado na pasta public):

    RewriteBase /laravelCRUD

Rota de inicio do projeto no meu computador ficou assim:

    'http://localhost/laravelCRUD/contas' vai para o app
    e 'http://localhost/laravelCRUD/' vai para welcome do laravel


![projeto CRUD](https://image.ibb.co/gP33Nn/contas01.png)


