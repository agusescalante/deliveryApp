FROM nginx:1.19.5

COPY vhost.conf /etc/nginx/conf.d/default.conf
