FROM nginx:1.19.4

COPY vhost.conf /etc/nginx/conf.d/default.conf
