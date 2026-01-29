# Mutation Detection API

API REST desarrollada en Laravel para detectar mutaciones genéticas a partir de secuencias de ADN.
El servicio permite validar secuencias, almacenar resultados en base de datos y consultar estadísticas e historial de ejecuciones.

---

## Tecnologías utilizadas

- PHP
- Laravel
- SQLite
- Docker
- Render

---

## Descripción del problema

Una secuencia de ADN se representa como un arreglo de strings NxN.
Cada carácter solo puede ser:

- A
- T
- C
- G

Existe mutación genética cuando se encuentran **dos o más secuencias** de **cuatro letras iguales consecutivas**, de forma:

- Horizontal
- Vertical
- Diagonal
- Diagonal inversa

---

## Endpoints disponibles

### POST /api/mutation

Detecta si una secuencia de ADN tiene mutación.

**Request**

```json
{
    "dna": ["ATGCGA", "CAGTGC", "TTATGT", "AGAAGG", "CCCCTA", "TCACTG"]
}
```

**Responses**
· 200 OK → Mutación detectada
· 403 Forbidden → No es mutación
· 400 Bad Request → Formato inválido

## GET /api/list

Devuelve las últimas 10 verificaciones realizadas, incluyendo:
· Fecha de ejecución
· Cadena de ADN
· Resultado de la validación

## Instrucciones de ejecución y uso del servicio

### Ejecución local

**Requisitos:**
· PHP 8 o superior
· Composer

**Pasos de instalacion local**
En consola ejecutar los siguentes comandos en la carpeta de proyecto:

```bash
git clone https://github.com/JRickOSanchez/Backend-mutarion-api
cd mutation-api
composer install
php artisan migrate
php artisan serve
```

El servicio quedará disponible en: http://127.0.0.1:8000

### Ejecución remota

El servicio se encuentra desplegado en la nube y accesible públicamente en: https://mutation-api-luia.onrender.com

## Ejemplos de peticiones al servicio remoto

**Detectar mutación genética**
en la consola poner:

```bash
curl -X POST https://mutation-api-luia.onrender.com/api/mutation -H "Content-Type: application/json" -H "Accept: application/json" -d "{\"dna\":[\"ATGCGA\",\"CAGTGC\",\"TTATGT\",\"AGAAGG\",\"CCCCTA\",\"TCACTG\"]}"
```

## Obtener estadísticas

```bash
curl https://mutation-api-luia.onrender.com/api/stats
```

## Notas

· El backend se encuentra desplegado en la nube.
· La base de datos utilizada es SQLite.
· El frontend consume este servicio de forma remota.
