FROM node:19
WORKDIR .
RUN npm install
RUN npm build
