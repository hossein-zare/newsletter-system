## Installation
1.
    ```bash
    composer install
    ```

2.
    ```bash
    npm install && npm run build
    ```

3. Rename `.env.example` to `.env` and configure database settings.
4.
    ```bash
    php artisan key:generate
    ```
5.
    ```bash
    php artisan migrate
    ```
6.
    ```bash
    composer run dev
    ```

## Routes

### Web Routes
- Home: `/`
- Subscribers: `/dashboard/subscribers`
- Newsletter: `/dashboard/newsletter`

### API Routes

All API requests must include the following header:
```bash
Accept: application/json
```

### Endpoints

- #### List Subscribers
  `GET /api/subscribers`  

- #### View Subscriber
  `GET /api/subscribers/{id}`  

- #### Create Subscriber
  `POST /api/subscribers`  

  ```json
  {
    "name" "John Doe",
    "email": "example@example.com",
    "is_active": true
  }

- #### Update Subscriber
  `PUT /api/subscribers/{id}`  

  ```json
  {
    "name" "John Doe",
    "email": "example@example.com",
    "is_active": false
  }

- #### Delete Subscriber
  `DELETE /api/subscribers/{id}`
