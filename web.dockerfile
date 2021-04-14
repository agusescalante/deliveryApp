FROM nginx:1.19.10

COPY vhost.conf /etc/nginx/conf.d/default.conf
