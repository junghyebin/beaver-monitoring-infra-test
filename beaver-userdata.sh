#!/bin/bash
sudo dnf update -y
sudo dnf install -y nginx
sudo systemctl start nginx
sudo systemctl enable nginx
echo "System Update and nginx Installation Completed Successfully!"