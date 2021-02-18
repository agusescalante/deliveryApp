FROM nginx:1.19.7

COPY vhost.conf /etc/nginx/conf.d/default.conf
