<p align="center"><a href="https://jobs.backbonesystems.io/positions/7" target="_blank"><img src="https://jobs.backbonesystems.io/images/bkbn.webp" width="400"></a></p>

## Challenge

El reto consiste en utilizar el framework Laravel para replicar la funcionalidad de esta api (https://jobs.backbonesystems.io/api/zip-codes/01210), utilizando esta fuente de información (https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx).
El tiempo de respuesta promedio debe ser menor a 300 ms, pero entre menor sea, mejor.
[GET] https://jobs.backbonesystems.io/api/zip-codes/{zip_code}

## Inicio

1) php artisan migrate:fresh --seed
2) php artisan serve
3) Enjoy!

## Descripción de la solución

Se realizó un análisis de la fuente de datos, lo que derivo en la generación de los siguientes modelos: entidad federal, ciudad, municipio, asentamiento, tipo de asentamiento y código postal. Se decide realizar la entidad código postal, debido a que el principal atributo de calidad es la performance, por lo que con esa premisa y en este contexto, cobra sentido separarlo en una entidad, en otro caso hubiese sido un atributo del asentamiento.

Se importa la información de SEPOMEX mediante un csv, para esto se utilizó el paquete laravel maatwebsite/excel, en las tablas de cada uno de los modelos mencionados previamente.

Se genera el recurso para código postal (zip-codes) retornando el mismo contenido que la api a replicar.

Además se agregaron algunos casos de test y se dejaron los recursos generados para una posible extensión de la api.
