# Proyecto_E-Recycle
Proyecto de Inteligencia Artificial para la detección, clasificación y reciclaje de residuos electrónicos  (e-waste).

<br>

![Img1](/Demostrations/1.png)
![Img2](/Demostrations/2.png)
![Img3](/Demostrations/3.png)

## Proyecto construido con: 

- Python: Entrenamiento del modelo de IA y detección de residuos.
- CakePhp: Componente web
- MySQL: Base de datos

<br>

## Ejecutar el proyecto de forma local

### Paso 1: Clonar el repositorio o descargar las carpetas y archivo SQL

```
git clone https://github.com/Micharrieta/Proyecto_E-Recycle.git
```

### Paso 2: Crear una base de datos MySQL e importar el archivo "e-recycle.sql"

### Paso 3: Crear un archivo .env 

Se debe crear un archivo .env en la raiz de cada parte, tanto en la App Python como en el componente web CakePHP

- El archivo .env contendrá las credenciales para la conexion a la base de datos, se sugiere la siguiente estructura presente en los archivos .env.example

```
DB_HOST=localhost
DB_USER=tu_usuario
DB_PASS=tu_contraseña
DB_NAME=nombre_de_tu_base
```

### Paso 4: Ejecutar App Python

Para ejecutar la app python se debe tener instalado localmente Python, crear un nuevo proyecto, pegar las carpetas dentro de "AppPython" e instalar las siguientes dependencias:

```
pip install ttkthemes
pip install Flask
pip install mysql-connector-python
pip install ultralytics
pip install opencv-python
pip install python-dotenv
```

### Paso 5: Ejecutar componente web CakePHP

Para ejecutar el componente web creado con Cakephp se debe contar con php 8.2, o superior, tener composer y ejecutar en el directorio "bin" los siguientes comandos:

```
composer require vlucas/phpdotenv
```

```
cake server
```

<br>

Una vez completados los pasos anteriores podras detectar e identificar todos tus residuos electronicos.

<br>

## Proyecto universitario creado por:

- Sharith Maldonado
- Michael Ferreira
- María Ferrer
- Camila Charris
- Angelica Cardenas 


