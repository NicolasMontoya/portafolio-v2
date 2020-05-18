# Stage - Production
FROM nginx:1.17-alpine
COPY ./src /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]