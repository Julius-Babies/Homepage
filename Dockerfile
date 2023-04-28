FROM node:19
WORKDIR .
RUN npm install
RUN npm run serve -- --port 8004
