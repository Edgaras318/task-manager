# Task Management System

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About

This application provides a RESTful API for managing entities and their associated comments. It allows users to create, read, update, delete entities and comments, including the ability to reply to comments.

## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Setup Instructions

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/entity-management-system.git
   cd entity-management-system

2. **Setup Environment Variables**

   ```bash
   cp .env.example .env

Update the .env file with your database connection details and other configurations.

3. **Build and Run the Docker Containers**

   ```bash
   docker-compose up -d

4. **Run Migrations**
   To set up the database schema, run:
   ```bash
   docker-compose exec app php artisan migrate

5. **Seed the Database (Optional)**
   If you want to seed the database with initial data, run:
   ```bash
   docker-compose exec app php artisan db:seed

## API Endpoints

### Entities

- **GET /api/entities**
    - Retrieves all entities.

- **POST /api/entities**
    - Creates a new entity.
    - **Request Body:**
      ```json
      {
        "title": "Entity Title",
        "description": "Description of the entity",
        "creator": "Creator Name",
        "tester": "Tester Name",
        "assignee": "Assignee Name",
        "status": "open",
        "type": "bug"
      }
      ```

- **GET /api/entities/{id}**
    - Retrieves a specific entity by its ID.

- **PUT /api/entities/{id}**
    - Updates a specific entity.
    - **Request Body:**
      ```json
      {
        "title": "Updated Title",
        "description": "Updated Description",
        "creator": "Updated Creator Name",
        "tester": "Updated Tester Name",
        "assignee": "Updated Assignee Name",
        "status": "closed",
        "type": "feature"
      }
      ```

- **DELETE /api/entities/{id}**
    - Soft deletes a specific entity.

- **PUT /api/entities/{id}/status**
    - Changes the status of a specific entity.
    - **Request Body:**
      ```json
      {
        "status": "in_progress"
      }
      ```

- **PUT /api/entities/{id}/type**
    - Changes the type of a specific entity.
    - **Request Body:**
      ```json
      {
        "type": "task"
      }
      ```

### Comments

- **POST /api/entities/{entityId}/comments**
    - Adds a new comment to a specific entity.
    - For top-level comment or existing comment ID for replies
    - **Request Body:**
      ```json
      {
        "comment": "This is a comment.",
        "parent_id": null 
      }
      ```

- **GET /api/entities/{entityId}/comments**
    - Retrieves all comments for a specific entity.
