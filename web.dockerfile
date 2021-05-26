FROM nginx:1.21.0

COPY vhost.conf /etc/nginx/conf.d/default.conf
