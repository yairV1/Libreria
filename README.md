# 📚 Sistema de Gestión de Librería

Sistema web desarrollado con **Laravel** que permite la gestión de libros y categorías dentro de una biblioteca.
El sistema incluye funcionalidades para crear, editar, visualizar y eliminar registros, además de autenticación de usuarios.

---

# 🚀 Tecnologías utilizadas

El proyecto fue desarrollado utilizando las siguientes tecnologías:

* **PHP**
* **Laravel**
* **MySQL**
* **Blade**
* **Bootstrap / CSS**
* **Node.js**
* **Vite**
* **Laravel Breeze** (para autenticación)

---

# ⚙️ Proceso de desarrollo del proyecto

A continuación se describe el proceso que se siguió para desarrollar el sistema.

## 1️⃣ Creación del proyecto

El proyecto se creó utilizando Composer con el framework Laravel.

composer create-project laravel/laravel bibliotecas

Esto generó la estructura base del proyecto.

---

## 2️⃣ Configuración del archivo `.env`

Después de crear el proyecto, se realizaron los ajustes en el archivo `.env` para configurar la conexión con la base de datos.

Ejemplo de configuración:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca
DB_USERNAME=root
DB_PASSWORD=

---

## 3️⃣ Creación de las migraciones

Posteriormente se crearon las migraciones para definir la estructura de las tablas que se utilizarían en la base de datos.

Las principales tablas creadas fueron:

* **libros**
* **categorias**

Dentro de cada migración se definieron los campos necesarios para cada tabla.

Luego se ejecutaron las migraciones con el siguiente comando:

php artisan migrate

Esto permitió crear automáticamente las tablas en la base de datos.

---

## 4️⃣ Creación de modelos

Después se crearon los modelos que representan cada tabla en el sistema.

Los modelos creados fueron:

* **Libro**
* **Categoria**

Los modelos permiten interactuar con la base de datos utilizando Eloquent ORM de Laravel.

---

## 5️⃣ Creación de controladores

Posteriormente se crearon los controladores para manejar la lógica del sistema.

Los controladores permiten gestionar las operaciones CRUD:

* Crear registros
* Mostrar registros
* Editar registros
* Eliminar registros

Esto permitió controlar el flujo entre las vistas y la base de datos.

---

## 6️⃣ Creación de las vistas

Luego se desarrollaron las vistas utilizando **Blade**, el motor de plantillas de Laravel.

Se crearon las siguientes vistas principales:

### Categorías

* Crear categoría
* Editar categoría
* Ver categoría

### Libros

* Crear libro
* Editar libro
* Ver libro

En estas vistas también se agregaron **estilos personalizados para mejorar la interfaz del sistema**.

---

## 7️⃣ Implementación de autenticación

Se implementó el sistema de autenticación utilizando **Laravel Breeze**, el cual permite gestionar:

* Registro de usuarios
* Inicio de sesión
* Cierre de sesión
* Protección de rutas

Para instalarlo se utilizaron dependencias de Node.js y Composer.

---

## 8️⃣ Diseño del sistema

Finalmente se agregaron **estilos personalizados** a diferentes vistas del sistema para mejorar la apariencia visual del proyecto.

Entre las vistas que se diseñaron se encuentran:

* Dashboard
* Perfil
* Gestión de libros
* Gestión de categorías

---

# ▶️ Cómo ejecutar el proyecto

Para ejecutar el proyecto en un entorno local se deben seguir los siguientes pasos:

1️⃣ Clonar el repositorio

git clone https://github.com/tu-usuario/Libreria.git

2️⃣ Entrar al proyecto

cd Libreria

3️⃣ Instalar dependencias de PHP

composer install

4️⃣ Instalar dependencias de Node

npm install

5️⃣ Ejecutar migraciones

php artisan migrate

6️⃣ Iniciar el servidor

php artisan serve

El sistema estará disponible en:

http://127.0.0.1:8000

---

# 📂 Estructura del proyecto

El proyecto sigue la estructura estándar de Laravel:

app/
├── Models
├── Http/Controllers

database/
└── migrations

resources/
└── views
├── categorias
├── libros
└── layouts

routes/
└── web.php

---

# 👨‍💻 Autor

Proyecto desarrollado como práctica para la gestión de bibliotecas utilizando Laravel.

---

# 📄 Licencia

Este proyecto es de uso educativo.
