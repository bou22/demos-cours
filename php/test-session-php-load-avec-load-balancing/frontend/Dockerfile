FROM node:17

WORKDIR /srv

COPY package.json .

RUN npm install

COPY . .

CMD ["npm", "run", "build:prod"]
