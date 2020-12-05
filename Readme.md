# Gestor de una empresa  



## Instrucciones para poner a funcionar esta movida y probarla  

1. Instala docker en tu ordenador, será un comandillo de na, eso te lo dejo a ti :)  

2. Dentro de esta carpeta ejecuta `docker-compose up -d`

3. Abre navegador en  `localhost:8080` debería estar nuestra paginilla

Si actualizamos la base de datos o cammbiamos cosas iniciales, hay que empezar desde cero, esto será: 

```
docker-compose down -v
docker-compose up -d
```

Para tener información globar de todo:  `docker-compose up --remove-orphan --build`

Para acceder a un contendor concreto `docker exec -it gestor-empresa_mariadb_1 bash`




### Instalación de docker ejemplo simplón pa novatillos <3   

1. Instala docker en tu ordenador, será un comandillo de na, eso te lo dejo a ti :)  

2. Descargamso la imagen de docker de mariadb, la base de datos que vamos a utilizar: `docker pull mariadb`.   

3. Empezamo una instancia del docker de mariadb 

`docker run --name mariadb -e MYSQL_ROOT_PASSWORD=ddsi -d mariadb:latest`

Información del comandillo que acabamso de hacer: 
`mariadb:latest` es la versión de mariadb que hemos descargado al hacer el pull, al no haber indicado nada pro defento tiene la etiqueta latest 

`MYSQL_ROOT_PASSWORD` es la contraseña del root que hemos seleccionado   
`--name mariadb` es el nombre que le damos nosotros para identificar nuestra imagen.   

Con este comando la habremos puesto a ejecutar, es decir estará escuchando peticiones,( podemos ver registor de qué contenadores están activos con  `docker ps`) ,pero ¿qué pasa si queremos acceder a ella mara modificarla?   

Podeos detener proceso con `docker stop mariadb` y volver a comenzarlos con `docker restart mariadb`. 


Para ello utilizaremos el siguiente comando (tiene que estar ejecutándose)

`docker exec -it  mariadb bash`

Lo que le estamos diciendo con esto es que vamos a utilizar la orden `bash` que contiene el contenedor mariadb.   

Si hacemos `ls` veremos el gestor de fichero de la imagen de debian sobre la que se montó mariadb, y cómo no podemos acceder a nuestra base de datos como: 

`mariadb -uroot -pddsi`    

### Otros comándo útiles de docker  

- Para ver imágenes instaladas:    `docker images`    
  
- Para borrar imagnes de docker:  `docker rmi <nombre>`  
- Para ver contenedores `docker ps -a`  
- Para borrar contenedores `docker rm <CONTAINER ID>`  

Nota: Con los tres primeros númerod de `CONTAINER ID`(que puedes conocer haciendo `docker ps -a` te basta para borrar las cosas. 
  

## Cómo ha sido creada esta imagen   


### Primeros pasos con docker   

Crear un archivo `Dockerfile`  

```
FROM mariadb
RUN echo "Hola mundo"
```

La primera línea indica el contenedor sobre el que nos basamos, run es el comando que se ejecuta durante el proceos de creación de la imagen. 

Ahora para crear nuestra imagen usaremos docker build.

`docker build -t helloapp:v1 . `

El parámetro -t nos permite etiquetar la imagen con un nombre y una versión. El . indica que el build context es el directorio actual.


#### Veamos nuestra aplicación   



# Recursos  

## Mariadb y docker   
-  https://hub.docker.com/_/mariadb?tab=reviews  
- https://mariadb.com/kb/en/installing-and-using-mariadb-via-docker/  
- https://dockertips.com/utilizando-docker-compose
- https://levelup.gitconnected.com/two-ways-to-automatically-initialize-mysql-in-docker-e499a9084757

## Crear una imagen de docker  
- https://aulasoftwarelibre.github.io/taller-de-docker/dockerfile/  
- https://www.atareao.es/tutorial/docker/crear-tus-propias-imagenes-docker/  
- https://linuxconfig.org/how-to-create-a-docker-based-lamp-stack-using-docker-on-ubuntu-20-04
-https://github.com/celsocelante/docker-lamp/blob/master/app/index.php  

## Docker comandos   

- https://www.vidaxp.com/tecnologia/como-borrar-imagenes-contenedores-y-volumenes-docker/  

## Lamp docker  

https://www.centlinux.com/2020/03/configure-lamp-stack-in-docker-containers.html
