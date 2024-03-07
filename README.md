# LB-Manager

## Overview
LB-Manager is an advanced system designed to manage load balancing across multiple domains. It provides a robust mechanism to monitor application server availability and dynamically update DNS zones to ensure optimal traffic distribution and uptime.

## Features
- **Domain Management**: Easily add and manage domains and subdomains, integrating seamlessly with your DNS settings.
- **Health Checks**: Automatically monitor the status of application servers to detect downtime or performance issues.
- **DNS Zone Management**: Dynamically update DNS records to reroute traffic, ensuring high availability and load distribution.
- **User-Friendly Interface**: A web-based frontend that simplifies the process of load balancing management, making it accessible for administrators with varying levels of technical expertise.

## Frontend
The frontend of LB-Manager is already developed, offering an intuitive interface for managing the load balancing configurations. It allows administrators to easily interact with the system's features, providing a seamless user experience.

## Backend
The backend will be developed as a separate project using Python. It will handle the core functionalities of the system, including server health checks, DNS zone updates, and the overall logic for load balancing management.

## Goal
The primary aim of LB-Manager is to provide a reliable and user-friendly platform for system administrators to oversee and manage the load balancing of their web infrastructure efficiently, ensuring consistent performance and availability.


# Database Configuration

To set up the database for the LB Manager project, you need to import the SQL file located in the project directory. The SQL file can be found at `DATABASE-TO-IMPORT/lb_manager.sql`, and it contains the necessary structure and data for the `lb_manager` database.

## Importing via Command Line

To import the database using the command line, execute the following command:

```bash
mysql -u your_mysql_username -p your_mysql_password lb_manager < DATABASE-TO-IMPORT/lb_manager.sql
```


Note: Replace your_mysql_username and your_mysql_password with your MySQL credentials. The lb_manager is the name of the database and should be used as is.

Note: The default username admin and password KZC8y2ty5I mentioned earlier are for logging into the PHP system that we have developed, not for the MySQL database.