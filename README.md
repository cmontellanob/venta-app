# ejecutar el server en pruebas
php artisan serve

# CRear Modelo, migracion, controlador, resorce, factpry y seeder
php artisan make:model Producto -mcrfs

# Borrala base de datos hace correr todas lasmigraciones y los seeders declarados en el database seeder 

php artisan migrate:fresh --seed

# antes de levantar el servidor

php artisan key:generate
