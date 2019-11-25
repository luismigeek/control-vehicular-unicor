# control-vehiculas-unicor
(Proyecto educativo) Pagina para controlar la entrada y salida de vehiculos en la Universidad de Cordoba


## Generalidades
Cuenta con validacion en cada uno de sus campos en formularios de REGISTRO y valida que en otros formularios, por ejemplo, Login, Recuperación de contraseña no haya inyección de codigo. Esto gracias a funciones de validacion que limpian las cadenas de texto.

Los nombres de usuario solo pueden contener letras y numeros, en un rango de 5 y 12 caracteres. 
Las contraseñan validas son las que contengan mayusculas, minusculas, numeros y caracteres especiales, en un rango de 8 y 16 caracteres.
Antes de que la contraseña se inserte en la base de datos, ésta es cifrada con Bcrypt, que transforma la misma en un hash.

La opcion "¿Olvidó su contraseña?" funciona creando un codigo de verificacion, para el cual se usó SHA-1, éste codigo se envia al correo  haciendo uso de PHPMailler, este codigo es almacenado en la base de datos a espera de que quien lo reciba lo ingrese en la plataforma para confirmar el acceso a una nueva contraseña.

Otras caracteristicas: 
- Arquitectura de desarrollo, MVC
- Las peticiones se hacen utilizando AJAX, 
- Lenguaje de programacion: PHP version 7.3.7
- Lenguaje de consultas: SQL
- SGBD: MySQL
- HTML5
- Bootstrap
- JQuery
- JavaScript
- CSS

# Dashboard
![Dashboard](https://raw.githubusercontent.com/luismigeek/control-vehicular-unicor/master/assets/home.png)

# Vehiculos registrados
![Vehiculos registrados](https://raw.githubusercontent.com/luismigeek/control-vehicular-unicor/master/assets/vehiculos.png)

# Panel Admin
![Panel admin](https://raw.githubusercontent.com/luismigeek/control-vehicular-unicor/master/assets/admin.png)
