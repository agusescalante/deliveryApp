FROM nginx:1.19.3

COPY vhost.conf /etc/nginx/conf.d/default.conf
