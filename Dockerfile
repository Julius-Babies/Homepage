FROM node:19
WORKDIR /usr/app
COPY ./ /usr/app
RUN npm install
RUN npm run serve -- --port 8004
