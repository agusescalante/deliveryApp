FROM nginx:1.19.8

COPY vhost.conf /etc/nginx/conf.d/default.conf
