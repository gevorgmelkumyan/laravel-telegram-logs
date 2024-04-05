# Laravel Telegram Logs

The repository contains a Laravel application showcasing a custom logging channel for Telegram.

## Table of Contents

- [Getting Started](#getting-started)
- [Makefile Commands](#makefile-commands)
- [Environment Configuration](#environment-configuration)
- [License](#license)

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Getting Started

First, make sure you have `docker` and `make` installed in your system. To set up the project on your local machine, follow these steps:

1. Clone the repository:

```bash
git clone https://github.com/gevorgmelkumyan/laravel-telegram-logs.git
```

2. Start the Docker environment using the Makefile `run` command:

```bash
make run
```

The web application should be available at `http://localhost:8084`.

## Makefile Commands

The Makefile provides several useful commands for interacting with the Docker environment:

- `make run`: Build and start the Docker containers
- `make stop`: Stop the Docker containers
- `make down`: Remove the Docker containers, volumes, and images

## Environment Configuration

The custom Docker environment is configured using a combination of Makefile, `update.env.sh` script, and Docker-related
files. The Makefile defines commonly used commands, the `update.env.sh` script sets up the necessary environment
variables, and the Docker-related files (located in the `/docker` directory) define the services the Laravel
application relies on.

## License

This project is released under the [MIT License](https://opensource.org/licenses/MIT).