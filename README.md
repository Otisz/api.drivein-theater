# Drive-in Theater API

## Setup

1. Clone the repo
   ```bash
   git clone https://github.com/Otisz/api.drivein-theater.git
   ```
2. Install dependencies
   ```bash
   composer install
   pnpm install
   pnpm run build
   ```
3. Setup `.env` file
   - ```bash
     cp .env.example .env
     php artisan key:generate
     ```
   - Fill in the rest of the variables based on your environment

4. Setup Passport
   ```bash
   php artisan passport:keys
   ```

5. Run migrations
   ```bash
   php artisan migrate
   ```
   
6. Run seeders
   ```bash
   php artisan db:seed
   ```
 
## Testing

```bash
php artisan test
```
