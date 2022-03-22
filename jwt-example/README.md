# JWT example

Get a JWT as admin:
```bash
curl -X POST -H "Content-Type: application/json" -d "{\"username\": \"admin\", \"password\": \"admin\"}" localhost:9000/login
```

Get a JWT as user:
```bash
curl -X POST -H "Content-Type: application/json" -d "{\"username\": \"user\", \"password\": \"user\"}" localhost:9000/login
```

Get data:
```bash
curl -X POST -H "authorization: <jwt>" localhost:9000/api/data
```
