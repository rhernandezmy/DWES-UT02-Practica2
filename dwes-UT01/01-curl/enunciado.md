## Ejercicio 1: Consulta mediante `curl`


## 🧩 Ejercicio 1: Consulta de datos meteorológicos con `curl` y la API de AEMET

### 📘 Objetivo

Aprender a realizar peticiones HTTP desde la línea de comandos utilizando `curl`, analizando las **cabeceras** de respuesta y el **contenido JSON** devuelto por un servicio web público.

### 🧠 Contexto

La **AEMET (Agencia Estatal de Meteorología)** dispone de una API REST que ofrece datos meteorológicos de toda España.
El acceso es libre, pero requiere un **token de autenticación** que puedes solicitar gratuitamente en su [portal de datos abiertos](https://opendata.aemet.es/centrodedescargas/inicio).

### 📁 Pasos a seguir

1. **Guarda tu token de AEMET** (reemplaza el valor del ejemplo por el tuyo real):

   ```bash
   TOKEN=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJyaGVybmFuZGV6bXlAZnB2aXJ0dWFsYXJhZ29uLmVzIiwianRpIjoiY2NmYTc0MGItNTcyYS00OGFjLWIwZTQtNmViMzNhMDIzMjc4IiwiaXNzIjoiQUVNRVQiLCJpYXQiOjE3NjY5NDM2NTgsInVzZXJJZCI6ImNjZmE3NDBiLTU3MmEtNDhhYy1iMGU0LTZlYjMzYTAyMzI3OCIsInJvbGUiOiIifQ.i5Oy5tRYytG_RQLvbPI-h5bEGO2f7zW4jkoApI9mt40
   ```

2. **Realiza una petición a la API** para obtener la predicción general de España:

   ```bash
   curl -i -H "accept: application/json" \
        -H "api_key: eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJyaGVybmFuZGV6bXlAZnB2aXJ0dWFsYXJhZ29uLmVzIiwianRpIjoiY2NmYTc0MGItNTcyYS00OGFjLWIwZTQtNmViMzNhMDIzMjc4IiwiaXNzIjoiQUVNRVQiLCJpYXQiOjE3NjY5NDM2NTgsInVzZXJJZCI6ImNjZmE3NDBiLTU3MmEtNDhhYy1iMGU0LTZlYjMzYTAyMzI3OCIsInJvbGUiOiIifQ.i5Oy5tRYytG_RQLvbPI-h5bEGO2f7zW4jkoApI9mt40" \
        "https://opendata.aemet.es/opendata/api/prediccion/nacional/hoy"
   ```

   > 🔍 La opción `-i` muestra las **cabeceras HTTP** junto con la respuesta.

3. **Analiza la cabecera de la respuesta**, donde encontrarás información como:

   ```
   HTTP/1.1 200 OK
   Content-Type: application/json;charset=UTF-8
   Date: Tue, 10 Oct 2025 09:12:47 GMT
   Server: nginx
   ```

   ✳️ Preguntas de reflexión:

   * ¿Qué indica el código de estado `200 OK`?
   * ¿Qué tipo de contenido devuelve la API?
   * ¿Qué función cumple el campo `Date`?

4. **Observa el contenido JSON devuelto**, por ejemplo:

   ```json
   {
     "descripcion": "exito",
     "estado": 200,
     "datos": "https://opendata.aemet.es/opendata/sh/xxxxxx",
     "metadatos": "https://opendata.aemet.es/opendata/sh/yyyyyy"
   }
   ```

   Este primer JSON **no contiene directamente los datos**, sino **la URL donde se encuentran**.
   Accede a esa dirección con `curl` para ver los datos reales:

   ```bash
   curl -s "https://opendata.aemet.es/opendata/sh/xxxxxx" | jq .
   ```

   (si tienes `jq` instalado, mostrará el JSON formateado)


