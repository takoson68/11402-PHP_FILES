# schoolInfo

Small PHP demo that serves school data from a JSON file and a simple front-end to browse it.

## Structure
- `index.php` ¡V front-end UI that calls the API and renders cards
- `api/schools.php` ¡V JSON API that supports optional `q`, `type`, `city`, and `id` filters
- `data/schools.json` ¡V sample dataset used by the API

## Run locally
```bash
php -S localhost:8000
# visit http://localhost:8000/schoolInfo/
```

## API usage
- `GET /schoolInfo/api/schools.php` ¡V all schools
- `GET /schoolInfo/api/schools.php?q=stem` ¡V search by keyword
- `GET /schoolInfo/api/schools.php?type=High&city=Taichung` ¡V filter by fields
- `GET /schoolInfo/api/schools.php?id=3` ¡V single school by id

Responses include `count`, `filters`, and `data` fields for easy consumption.
