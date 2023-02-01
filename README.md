# Billing Better Interview API 

This the solution to the coding challenge given by Billing better

## Requirements
- Docker
- PHP ^8.0.2


## Setup Dev Environment

After cloning the project run:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

### Copy the local environment file
```
cp .env.example .env
```

## Run
Next run the containers:
```
./vendor/bin/sail up
```
You can specify a custom port to run the app on in case port 80 is not free by running

```
APP_PORT=SOME-FREE-PORT ./vendor/bin/sail up
```
### Generate Application Key
```
./vendor/bin/sail artisan key:generate
```

## Run the migrations
```
./vendor/bin/sail artisan migrate
```



## Testing the API
Use postman to make your API call to the running app against the correct port, for instance:

For port 80 would have a base_uri of `localhost:80`

### Create property

Path: POST /api/v1/properties

Payload: 
```
{ 
  “address”: {
    “line_1”: “10”,
    “line_2”: “Test Street”,
    “postcode”: “E11AA”
  }
}
```

Response: 
```
{
    "message": "Property created successfully",
    "data": {
        "uuid": "985cc756-86b8-43dd-8526-204cf929e53a",
        "address": {
            "line_1": "10",
            "line_2": "Test street 2",
            "postcode": "EE11AA"
        }
    }
}
```


Path: POST /api/v1/properties/batch

Payload: 
```
{
    "properties": [
        {
            "address": {
                "line_1": "10",
                "line_2": "Test street",
                "postcode": "1234"
            }
        },
        {
            "address": {
                "line_1": "11",
                "line_2": "Test street 1",
                "postcode": "123455"
            }
        }
    ]
}
```

Response: 
```
{
    "message": "Properties created successfully",
    "data": [
        {
            "address": {
                "line_1": "10",
                "line_2": "Test street",
                "postcode": "1234"
            }
        },
        {
            "address": {
                "line_1": "11",
                "line_2": "Test street 1",
                "postcode": "123455"
            }
        },
    ]
}
```

### GET properties

GET /api/v1/properties
Response: 
```
{
    "message": "Properties fetched successfully",
    "data": {
        "data": [
            {
                "uuid": "985cc586-3a7c-41c5-9eb8-30d109d7b175",
                "address": {
                    "line_1": "10",
                    "line_2": "Test street",
                    "postcode": "EE11AA"
                }
            }
        ],
        "links": {
            "first": "http://localhost:86/api/properties?limit=10&page=1",
            "last": "http://localhost:86/api/properties?limit=10&page=1",
            "prev": null,
            "next": null
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 1,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://localhost:86/api/properties?limit=10&page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "path": "http://localhost:86/api/properties",
            "per_page": 15,
            "to": 1,
            "total": 1
        }
    }
}
```


