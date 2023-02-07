# Modèle de création du container

FROM node:latest

WORKDIR /home/app

COPY ./src .

RUN npm install

# Pour l'exécution de nodejs en ligne de commande
CMD ["node","server.mjs"]
