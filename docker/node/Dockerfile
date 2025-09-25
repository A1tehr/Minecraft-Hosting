FROM node:22-alpine

# Set working directory
WORKDIR /app

# Install global dependencies
RUN npm install -g @vue/cli vite

# Copy package files
COPY ./landing/package.json ./landing/package-lock.json /app/landing/

# Install landing dependencies
WORKDIR /app/landing
RUN if [ -f package.json ]; then npm ci; fi

# Copy source code
COPY ./landing /app/landing

# Build landing
WORKDIR /app/landing
RUN if [ -f package.json ]; then npm run build; fi

# Expose ports
EXPOSE 3000

# Start development servers
CMD ["sh", "-c", "cd /app/landing && npm run dev --host 0.0.0.0 --port 3000 & wait"]