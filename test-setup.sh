#!/bin/bash

# Test script to validate Melenium setup

echo "🚀 Testing Melenium Project Setup..."

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo "❌ Docker is not installed"
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose is not installed"
    exit 1
fi

echo "✅ Docker and Docker Compose are installed"

# Check if docker-compose.yml exists
if [ ! -f "docker-compose.yml" ]; then
    echo "❌ docker-compose.yml not found"
    exit 1
fi

echo "✅ docker-compose.yml found"

# Check if Docker files exist
if [ ! -d "docker" ]; then
    echo "❌ docker directory not found"
    exit 1
fi

echo "✅ Docker configuration directory found"

# Check landing directory
if [ ! -d "landing" ]; then
    echo "❌ landing directory not found"
    exit 1
fi

echo "✅ Landing directory found"

# Check panel directory  
if [ ! -d "panel" ]; then
    echo "❌ panel directory not found"
    exit 1
fi

echo "✅ Panel directory found"

# Check if main configuration files exist
files_to_check=(
    "docker/nginx/nginx.conf"
    "docker/nginx/conf.d/melenium.conf"
    "docker/php/Dockerfile"
    "docker/node/Dockerfile"
    "panel/.env"
    "panel/tailwind.config.js"
)

for file in "${files_to_check[@]}"; do
    if [ ! -f "$file" ]; then
        echo "❌ Required file $file not found"
        exit 1
    fi
done

echo "✅ All required configuration files found"

# Test Docker Compose validation
if docker-compose config > /dev/null 2>&1; then
    echo "✅ Docker Compose configuration is valid"
else
    echo "❌ Docker Compose configuration has errors"
    exit 1
fi

echo ""
echo "🎉 Melenium project setup validation completed successfully!"
echo ""
echo "📝 Next steps:"
echo "1. Run: docker-compose up -d"
echo "2. Access Landing: http://localhost"
echo "3. Access Panel: http://panel.localhost"
echo ""
echo "🎨 Design Features:"
echo "- Modern dark theme with blue and green accents"
echo "- Glassmorphism effects"
echo "- Animated starry background" 
echo "- Gradient navigation and buttons"
echo "- Enhanced typography and spacing"