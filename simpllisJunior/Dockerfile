FROM weyveo/nginx-php:lasted
LABEL authors="Murilo"

#envia o ngix.conf para dentro da pasta html
COPY . /usr/share/ngix/html

WORKDIR . /usr/share/ngix/html

EXPOSE 80

RUN ln -s public html
