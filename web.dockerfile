FROM nginx:1.21.1

COPY vhost.conf /etc/nginx/conf.d/default.conf
