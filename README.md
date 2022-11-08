# ProyectoFormulariosDWES

## 1. Descripción del proyecto

En este proyecto queremos plantear un sistema de usuarios que puedan comprar entradas a eventos creados por un usuario administrador.

## 2. Objetos a emplear

### 2.1. Usuarios

Vamos a plantear un sistema de usuarios en el que tendremos tres tipos de usuarios: 
- Usuario
- UsuarioPremium
- UsuarioAdministrador

Estos usuarios están designados de manera que **Usuario** sea el padre de **UsuarioPremium** y de **UsuarioAdministrador**. Sus atributos serán los siguientes:

- El **Usuario** es el tipo básico, contará con los atributos correo, contraseña, nombre, teléfono y sexo.
- El **UsuarioPremium** cuenta con los mismos atributos que el **Usuario**. Además de esto, se le añade un descuento a las entradas del 15% para los conciertos y un 25% para el cine.
-  El **UsuarioAdministrador** cuenta con los mismos atributos que el **Usuario**. Además de esto, este usuario tiene la capacidad de registrar y eliminar eventos en la base de datos. 

### 2.2. Eventos

El sistema de eventos lo vamos a plantear de la siguiente manera: 

- Evento
- Cine
- Concierto

Vamos a plantear una herencia en la que **Evento** será el padre y **Cine** y **Concierto** serán sus hijos. Los objetos cuentan con los siguientes atributos:

- El **Evento** tiene como parámetros nombre, fecha, lugar, tarifa de entrada y aforo máximo.

- El **Cine** tendrá los atributos del **Evento** además de tener como atributo una **Pelicula**:
    - De la **Pelicula** nos interesa guardar su nombre, duración y **Genero**.
    - Los únicos géneros permitidos son los siguientes: 
        - Acción
        - Aventura
        - Catástrofe
        - Ciencia Ficción
        - Comedia 
        - Documentales
        - Drama
        - Fantasía

- El **Concierto** tendrá los atributos del **Evento** y además tendrá como atributo un **Grupo**:
    - Del **Grupo** nos interesa guardar su nombre y su **EstiloMusical**: 
        - Clásica
        - Jazz
        - Rock
        - Metal
        - Disco
        - Pop
        - Trap
        - Reggaeton

### 2.3. Entradas  
In progress...
