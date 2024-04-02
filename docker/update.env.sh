#!/bin/bash

PROJECT_ENV_FILE="../.env"
DOCKER_ENV_FILE=".env"

if [ ! -f "$DOCKER_ENV_FILE" ]; then
    echo "docker/.env is missing, copying from docker/.env.example..."
    cp .env.example .env
fi

if [ ! -f "$PROJECT_ENV_FILE" ]; then
    echo "application .env is missing, copying from .env.example..."
    cp ../.env.example ../.env

    # Load environment variables from .env to this script's session
    set -a
    [ -f .env ] && . ./.env
    [ -f ../.env ] && . ../.env
    set +a

    if [ -z "$APP_URL" ]; then
        APP_URL="http://localhost:$SERVER_PORT"
    fi

    # Export all the necessary variables fetched from both .envs to the application .env
    {
        printf "\n"
        echo "APP_URL=$APP_URL"
        printf "\n"
        echo "REDIS_HOST=redis"
        echo "REDIS_PORT=6379"
    } >> ../.env
fi
