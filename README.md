<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca del proyecto

Sistema contabla para optimizar la gestion financiera

## Capturas del proyecto
#### Modulo de clientes
![Descripción de la imagen](/public/readme/clientes.png)
#### Movimientos
![Descripción de la imagen](/public/readme/movimientos.png)
#### Bancos
![Descripción de la imagen](/public/readme/bancos.png)
#### Factura
![Descripción de la imagen](/public/readme/factura.png)

## Instalar el proyecto
- Copiar este repositorio 
```
git clone https://github.com/pierodev0/contable-laravel.git
```
- Instalar las dependencias de composer
```
composer install
```
- Instalar las dependencias de node modules
```
npm install
```
Generar la clave de laravel
```
php artisan key:generate
```
- Hacer el deploy del proyecto en un server local
```
php artisan serve
```
- Abrir otra terminal y correr vite
```
npm run dev
```
- Correr las migraciones con los seeder
```
php artisan migrate --seed
```
- Credenciales para iniciar sesion
```
admin@admin.com
12345678
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
