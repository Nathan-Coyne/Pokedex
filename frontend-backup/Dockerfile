# frontend/Dockerfile

FROM node:16-alpine

# Set working directory
WORKDIR /app

# Copy existing application directory contents
COPY pokedex /app

# Install dependencies
RUN npm install

# Build the application
RUN npm run build

EXPOSE 3000
CMD ["npm", "run", "serve"]