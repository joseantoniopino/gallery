# Galería de imágenes TALL STACK 🇪🇸
Este es un pequeño proyecto realizado con Laravel 10, Livewire 3, AlpineJS 3 y Tailwind 3
El proyecto consiste en una galería de imágenes que muestra las imágenes asociadas a cada modelo

## Instalación

1. Clonar el repositorio `https://github.com/joseantoniopino/gallery.git`
2. Copiar el .env.example a .env
3. Ejecutamos `docker compose build` y cuando termine `docker compose up -d`
4. (Opcional) Crear un alias para sail en tu .bash o en tu .zsh `alias  sail='[ -f sail ] && sh sail || sh vendor/bin/sail'` Este setup asumirá que tienes creado el alias. Si no es así, cada vez que en un comando se haga referencia a `sail` tu deberás escribir: `./vendor/bin/sail` Más información [aquí](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias)
5. Entramos al contenedor con `docker exe -it gallery-gallery.test bash` Si tu nombre de contenedor no coincide, puedes hacer un docker ps para el nombre correcto y reemplazarlo por `gallery-gallery.test`
6. Dentro del contenedor, hemos entrado como root, nos cambiamos al usuario sail `su sail`
7. Dentro del contenedor ejecutamos `composer install` y salimos del contenedor
8. Ahora ejecutamos `sail artisan storage:link` para que nos cree los dos links simbólicos que hay en el filesystem
9. Ejecutamos las migraciones con `sail artisan migrate --seed` Esto nos creará las tablas, los datos ficticios y las imágenes asociadas a los modelos. En el .env tienes las variables para determinar que cantidad de registros de prueba quieres.
10. Es opcional pero recomendable que en nuestro archivo hosts `/etc/hosts` añadamos el dominio gallery.test a nuestro mapeo de localhost
11. Ejecutamos `sail stop && sail up -d`
12. Ejecutamos `sail npm install && sail npm run build`
13. Si hemos mapeado nuestro archivo hosts podremos acceder desde la url gallery.test, si no desde localhost.

<hr>

# Image Gallery TALL STACK 🇬🇧
This is a small project built with Laravel 10, Livewire 3, AlpineJS 3, and Tailwind 3.
The project consists of an image gallery that displays images associated with each model.

## Installation

1. Clone the repository `https://github.com/joseantoniopino/gallery.git`.
2. Copy the .env.example to .env.
3. Run `docker compose build`, and when it's done, run `docker compose up -d`.
4. (Optional) Create an alias for Sail in your .bash or .zsh `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`. This setup assumes you have created the alias. If not, every time a command references `sail`, you'll need to type `./vendor/bin/sail`. More information [here](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias).
5. Enter the container with `docker exec -it gallery-gallery.test bash`. If your container name doesn't match, you can use `docker ps` to find the correct name and replace it with `gallery-gallery.test`.
6. Inside the container, we've entered as root, so switch to the sail user with `su sail`.
7. Inside the container, run `composer install`, and then exit the container.
8. Now, run `sail artisan storage:link` to create the two symbolic links in the filesystem.
9. Run the migrations with `sail artisan migrate --seed`. This will create tables, fake data, and images associated with models. In the .env file, you have variables to determine how many test records you want.
10. It's optional but recommended to add the domain `gallery.test` to your localhost mapping in your hosts file `/etc/hosts`.
11. Run `sail stop && sail up -d`.
12. Run `sail npm install && sail npm run build`.
13. If you've mapped your hosts file, you can access it from the URL gallery.test; if not, from localhost.
