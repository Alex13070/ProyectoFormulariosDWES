# ProyectoFormulariosDWES

## 1. Descripción del proyecto

En este proyecto queremos plantear un sistema de usuarios que puedan comprar entradas a eventos creados por un usuario administrador.

## 2. Objetos a emplear

### 2.1. Usuarios

Vamos a plantear un sistema de usuarios en el que tendremos tres tipos de usuarios: 
- Usuario
- UsuarioPremium
- UsuarioAdministrador

Estos usuarios están designados de manera que <u>Usuario</u> sea el padre de <u>UsuarioPremium</u> y de <u>UsuarioAdministrador</u>. Sus atributos serán los siguientes:

- El <u>Usuario</u> es el tipo básico, contará con los atributos correo, contraseña, nombre, teléfono y sexo.
- El <u>UsuarioPremium</u> cuenta con los mismos atributos que el <u>Usuario</u>. Además de esto, se le añade un descuento a las entradas del 15% para los conciertos y un 25% para el cine.
-  El <u>UsuarioAdministrador</u> cuenta con los mismos atributos que el <u>Usuario</u>. Además de esto, este usuario tiene la capacidad de registrar y eliminar eventos en la base de datos. 

### 2.2. Eventos

El sistema de eventos lo vamos a plantear de la siguiente manera: 

- Evento
- Cine
- Concierto

Vamos a plantear una herencia en la que <u>Evento</u> será el padre y <u>Cine</u> y <u>Concierto</u> serán sus hijos. Los objetos cuentan con los siguientes atributos:

- El <u>Evento</u> tiene como parámetros nombre, fecha, lugar, tarifa de entrada y aforo máximo.

- El <u>Cine</u> tendrá los atributos del <u>Evento</u> además de tener como atributo una <u>Pelicula</u>:
    - De la <u>Pelicula</u> nos interesa guardar su nombre, duración y <u>Genero</u>.
    - Los únicos géneros permitidos son los siguientes: 
        - Acción
        - Aventura
        - Catástrofe
        - Ciencia Ficción
        - Comedia 
        - Documentales
        - Drama
        - Fantasía

- El <u>Concierto</u> tendrá los atributos del <u>Evento</u> y además tendrá como atributo un <u>Grupo</u>:
    - Del <u>Grupo</u> nos interesa guardar su nombre y su <u>EstiloMusical</u>: 
        - Clásica
        - Jazz
        - Rock
        - Metal
        - Disco
        - Pop
        - Trap
        - Reggaeton

