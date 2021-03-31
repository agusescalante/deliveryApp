FROM nginx:1.19.9

COPY vhost.conf /etc/nginx/conf.d/default.conf
