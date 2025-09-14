# Docker LAMP Stack

This project sets up a simple LAMP (Linux, Apache, MySQL, PHP) stack using Docker and Docker Compose.  
It serves a basic PHP content inside `src` directory.

## Project Structure

```
docker_lamp/
├── Dockerfile
├── docker-compose.yml
├── src/
│   └── ** Source code **
└── README.md
```

## Setup Instructions

### 1. Build the Docker Images

```bash
docker-compose build
```

### 2. Start the Containers

```bash
docker-compose up -d
```

- The web server will be available at [http://localhost:8080](http://localhost:8080).

### 3. Access the Web Container Shell

```bash
docker-compose exec web bash
```

### 4. Stop and Remove the Containers

```bash
docker-compose down
```

- This stops and removes the containers but preserves the database data in the `db_data` volume.

## Notes

- Any changes to files in the `src/` directory will automatically sync to the running container.
- The MySQL database credentials are set in `docker-compose.yml`:
  - **Root password:** `rootpassword`
  - **Database:** `mydb`
  - **User:** `user`
  - **Password:** `userpassword`
- To restart the stack, simply run `docker-compose up -d` again.

---
Enjoy your local LAMP development environment!