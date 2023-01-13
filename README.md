# Yii2 advanced template for creating REST API backends.

Steps to start inside docker:

1. Copy .env.example to .env
```text
cp .env.example .env
```

2. Create runtime folders and give permissions
```text
mkdir backend/runtime frontend/runtime
chmod 777 backend/runtime
chmod 777 backend/web/assets
chmod 777 frontend/runtime
chmod 777 frontend/web/assets
```

3. Build images
```text
docker compose build
```

4. Run containers
```text
docker compose up -d
```

5. Install dependencies
```text
docker exec app_php composer install
```

6. Apply migrations
```text
docker exec app_php php yii migrate/up
```


Application will be available at
```text
http://frontend.localhost:8080
http://backend.localhost:8080

http://frontend.localhost:8080/debug
http://frontend.localhost:8080/gii

http://backend.localhost:8080/debug
http://backend.localhost:8080/gii
```

All main commands are in the Makefile. Use them.
