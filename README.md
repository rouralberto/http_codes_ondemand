# HTTP Codes On Demand

A lightweight service that allows developers to test and simulate HTTP status codes for application development and testing.

## Overview

HTTP Codes On Demand is a simple PHP web service that returns any valid HTTP status code on request. It provides:

- Response with the exact HTTP status code requested
- HTML page displaying the requested status code, description, and official specification link
- Support for all standard HTTP status codes (1xx, 2xx, 3xx, 4xx, 5xx)

## Usage

1. Start the service:
   ```
   docker-compose up -d
   ```

2. Request a specific HTTP status code:
   ```
   http://localhost/?code=404
   ```

3. The service will:
   - Set the actual HTTP response status to the requested code
   - Display an information page with details about the requested status code

## Use Cases

- Testing error handling in applications
- Simulating API responses with specific status codes
- Educational purposes to learn about HTTP status codes
- Validating client-side HTTP error handling

## Setup

### Option 1: Using the public Docker image

You can directly use the official Docker image:

```
docker run -d -p 80:80 roura/http-codes-ondemand
```

Service will be available at http://localhost

### Option 2: Local setup

Requires Docker and Docker Compose.

```
git clone https://github.com/rouralberto/http_codes_ondemand.git
cd http_codes_ondemand
docker-compose up -d
```

Service will be available at http://localhost
