FROM node:19
WORKDIR /usr/app
COPY ./www /usr/app
RUN npm install
CMD ["npm", "run", "serve", "--", "--port", "8004"]
