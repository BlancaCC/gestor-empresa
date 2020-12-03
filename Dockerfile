FROM furia/lamp
COPY ./web/index.html /var/www/html/
EXPOSE 80
RUN echo "Hola mundo"