FROM node:18-alpine

# Set working directory
WORKDIR /app

# Install global dependencies
RUN npm install -g @vue/cli vite

# Copy package files
COPY ./landing/package*.json /app/landing/
COPY ./panel/package.json /app/panel/

# Install landing dependencies
WORKDIR /app/landing
RUN if [ -f package.json ]; then npm install; fi

# Install panel dependencies  
WORKDIR /app/panel
RUN if [ -f package.json ]; then npm install; fi

# Copy source code
COPY ./landing /app/landing
COPY ./panel /app/panel

# Build landing
WORKDIR /app/landing
RUN if [ -f package.json ]; then npm run build; fi

# Build panel assets
WORKDIR /app/panel  
RUN if [ -f package.json ]; then npm run build:production; fi

# Expose ports
EXPOSE 3000 8080

# Start development servers
CMD ["sh", "-c", "cd /app/landing && npm run dev --host 0.0.0.0 --port 3000 & cd /app/panel && npm run serve --host 0.0.0.0 --port 8080 & wait"]