# Proyecto Avanzado de Lista de Tareas en PHP

Este es un proyecto avanzado de una Lista de Tareas (To-Do List) implementado en PHP con una arquitectura MVC básica y una base de datos MySQL.

## Características

- Agregar nuevas tareas con título y descripción
- Visualizar la lista de tareas
- Marcar tareas como completadas o pendientes
- Eliminar tareas existentes
- Almacenamiento persistente en base de datos MySQL
- Diseño responsivo con CSS personalizado

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Composer (para gestión de dependencias)
- Servidor web (por ejemplo, Apache)

## Instalación

1. Clone este repositorio en su máquina local:
   ```
   git clone https://github.com/tu-usuario/todo-list-php.git
   ```
2. Navegue al directorio del proyecto e instale las dependencias con Composer:
   ```
   cd todo-list-php
   composer install
   ```
3. Cree una base de datos MySQL y configure las credenciales en `config/database.php`.
4. Importe el esquema de la base de datos desde `database/schema.sql`.
5. Configure su servidor web para que apunte al directorio `public` como raíz del documento.

## Estructura del Proyecto

- `config/`: Contiene archivos de configuración
- `public/`: Directorio raíz web con el punto de entrada (index.php) y assets
- `src/`: Contiene el código fuente de la aplicación
  - `controllers/`: Controladores de la aplicación
  - `models/`: Modelos para interactuar con la base de datos
  - `views/`: Vistas de la aplicación
- `vendor/`: Dependencias de Composer (generado automáticamente)

## Uso

Acceda a la aplicación a través de su navegador web y podrá:
- Ver la lista de tareas existentes
- Agregar nuevas tareas
- Marcar tareas como completadas o pendientes
- Eliminar tareas