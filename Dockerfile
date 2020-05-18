# Stage - Production
FROM nginx:1.17-alpine
COPY ./ /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]