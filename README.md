## Instalación
Se crea un proyecto nuevo sin seleccionar ningún paquete de autenticación y el resto por defecto
````bash
larvel new ApiLogin
````
La base de datos voy a seleccionar ***Mysql***, pero se puede seleccionar cualquier opción 

## Creamos un api de profesores y alumnos

Para el ejemplo vamos a ofrecer datos de profesores y alumnos, dos tablas relacionadas con una cardinalidad **1:N**

![img.png](Documentacion/imagenes/alumno_profesor_er.png)

## Creando el ecosistema

1. Creamos las clases (modelos, controladores de api, migraciones, factory y seeder )
````shell
  php artisan make:model Student --api -fms
  php artisan make:model Teacher --api -fms
````

2. Creamos las tablas y las poblamos
* **students**
> [migracion students](database/migrations/2024_05_25_061331_create_students_table.php)

* **teachers**
> [migracion teachers](database/migrations/2024_05_25_061325_create_teachers_table.php)

* Creamos una **enumeración** para validar los datos del departamento de un profesor
> [validación departamento](app/Enums/DepartmentEnum.php)



