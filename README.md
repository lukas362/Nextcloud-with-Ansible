# Nextcloud set up with Ansible
Automated deployment of Nextcloud on bare metal Ubuntu servers using Ansible. This repository contains Ansible playbooks and configurations to automate the complete setup and deployment of Nextcloud on a bare metal Ubuntu server. It provides an efficient, repeatable, and streamlined approach to getting Nextcloud up and running with all necessary components.

## 🚀 Features

- **Automated Setup**: Complete automation of Nextcloud installation using Ansible
- **Full Stack Deployment**: Includes all required services (MariaDB, Redis, PHP, Apache2, SSL/TLS)
- **Add-ons**: Built-in support for Nextcloud Talk (Coturn) and Collabora Online
- **Backup**: S3-storage for storing files and used for backups of the files with Restic.
- **Infrastructure**: Works on any bare metal Ubuntu server or VM

## ⚙️ Tech Stack

- **Nextcloud**: Open-source cloud storage and collaboration platform
- **Web Server**: Apache2
- **Database**: MariaDB
- **Cache**: Redis
- **Language**: PHP
- **SSL/TLS**: Certbot
- **Voice/Video**: Coturn (for Nextcloud Talk)
- **Document Editing**: Collabora Online (optional)
- **Backup**: S3-storage + Restic (for having S3 storage)
- **Automation**: Ansible 2.16.3
- **Linting**: ansible-lint 6.17.2
- **Python**: 3.12.3

## 📋 Prerequisites

Before you begin, ensure you have the following:

### 1. On Your Control Machine
- **Ansible** installed and configured (sudo apt install -y ansible)
- **SSH Key Pair**: Generated SSH key for authentication
- **VS Code** or your preferred text editor (for editing playbooks)

### 2. On Target Server
- **Operating System**: Ubuntu 24.04.4 LTS (or compatible)
- **SSH Access**: Ability to connect via SSH using key-based authentication
- **Python**: Installed on the server
- **Network**: Access to required ports (see Firewall Configuration below)

### 3. Domain & Network
- **Domain Name**: A registered domain pointing to your server
- **Firewall Access**: Open the following ports on your firewall:

#### 4. Required Ports
- **Port 22 (TCP)**: SSH access
- **Port 80 (TCP)**: HTTP traffic (HTTP -> HTTPS redirect)
- **Port 443 (TCP)**: HTTPS traffic (SSL/TLS encrypted)

#### 5. Optional Ports (for additional features)
- **Port 3478 (TCP & UDP)**: Nextcloud Talk feature
- **Port 5349 (TCP & UDP)**: TURN over TLS for Talk fallback
- **Port 9980 (TCP)**: Collabora Online access (external mode only)
- **Port 49152-65535 (UDP)**: Coturn audio/video streaming

## 🛠️ Quick Start

### 1. Clone the Repository
```bash
git clone https://github.com/lukas362/Nextcloud-install-with-Ansible.git
cd Nextcloud-install-with-Ansible
```

### 2. Configure Inventory
Edit `inventory.ini` to specify your target servers:
```ini
[nextcloud]
your-server-ip ansible_user=root

[coturn]
your-server-ip ansible_user=root
```
### 3. Configure Variables
Edit `group_vars/all.yml` and replace all placeholder values with your own.

### 4. Verify Playbook Syntax
```bash
ansible-playbook -i inventory.ini --syntax-check site.yml
```

### 5. Run the Playbook and User Managment
```bash
ansible-playbook -i inventory.ini site.yml
ansible-playbook -i inventory.ini users.yml
```
## 📁 Repository Structure

```
.
├── README.md                # This file
├── ansible.cfg              # Ansible configuration
├── inventory.ini            # Host inventory
├── site.yml                 # Main playbook
├── users.yml                # User management playbook
├── group_vars/              # Group variables
└── roles/                   # Ansible roles
    ├── common_server_settings/
    ├── mariadb/
    ├── redis/
    ├── php/
    ├── apache2/
    ├── certbot/
    ├── nextcloud_setup/
    ├── nextcloud_backup/
    ├── nextcloud_users/
    ├── coturn/
    └── collabora/
```
---

**Created by**: [@lukas362](https://github.com/lukas362)  
**Last Updated**: April 23, 2026
