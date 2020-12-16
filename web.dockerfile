FROM nginx:1.19.6

COPY vhost.conf /etc/nginx/conf.d/default.conf
