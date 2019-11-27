#!/bin/sh

# Install dependencies
echo "Installing dependencies.."
cd /app
yarn install > /dev/null
echo "DONE!"

# Start apache
echo "Starting apache"
echo ""
echo ""
echo ""
echo ""
echo -e "\033[0;32m  ____  _____    _    ______   ___  \033[0m" 
echo -e "\033[0;32m |  _ \| ____|  / \  |  _ \ \ / / | \033[0m" 
echo -e "\033[0;32m | |_) |  _|   / _ \ | | | \ V /| | \033[0m" 
echo -e "\033[0;32m |  _ <| |___ / ___ \| |_| || | |_| \033[0m" 
echo -e "\033[0;32m |_| \_\_____/_/   \_\____/ |_| (_) \033[0m" 
echo ""
echo -e "\033[1;34mOpen http://localhost in your browser \033[0m"
echo -e "\033[1;34mPress Ctrl+C to shut down the server \033[0m"
httpd -D FOREGROUND
