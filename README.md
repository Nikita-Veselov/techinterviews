# Service Provider Directory

Simple Laravel module simulating a performance-sensitive service directory with filtering, pagination, and profile views.

---

## Design Decisions

- Flat schema: `service_providers` linked to `categories` via `category_id`
- Category filter uses AJAX and partial Blade render — no page reloads
- Pagination is server-side
- SCSS used with Bootstrap to include only required components

---

## Performance Optimizations

- Eager-loaded relationships to avoid N+1 queries
- Lazy-loaded, correctly sized images to prevent layout shift
- Gzip enabled via Valet for local compression testing
- Bootstrap SCSS stripped to essentials using Vite build
- Category list cached (`remember()`) for reduced query load

---

## Future Enhancements

- Full-text search (name/description)
- API version of filtering
- Category cache invalidation
- Responsive layout tweaks, dark mode, a11y

---

## Setup

```bash
cp .env.example .env
composer install
npm install
npm run build
php artisan key:generate

# If using Valet (https)
valet secure service-provider

# If NOT using Valet
npm run dev   # Starts Vite dev server on http://localhost:5173
```
---

## Screenshots

<img width="1704" alt="Image" src="https://github.com/user-attachments/assets/3cb678d4-a2b1-4020-8bab-cbeb0a2f6538" />
<img width="1249" alt="Image" src="https://github.com/user-attachments/assets/bf8be20d-7a98-4dfb-87b0-c2f24d474c6a" />
