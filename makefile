up:
	docker compose up -dev

down:
	docker compose down

cli:
	docker compose exec php-cli bash

npm-build:
	docker compose exec node npm run build

npm-dev:
	docker compose exec node npm run dev

npm-istall:
	docker compose exec node npm install
