# Dockerfile
FROM node:18-alpine

WORKDIR /usr/src/app

# 👇 Copy package.json and package-lock.json from backend folder
COPY backend/package*.json ./

# 👇 Install dependencies
RUN npm install

# 👇 Copy the rest of the backend code
COPY backend/ .

CMD ["node", "index.js"]
