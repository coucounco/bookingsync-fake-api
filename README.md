# BookingSync Fake API

## About

This is a replication of the bookingsync API with the ability to seed fake data. This project is made for developpment purpose.

## Getting started

Clone the reporitory
```
git clone git@github.com:Coucounco/bookingsync-fake-api.git
```

Install PHP dependencies
```
composer install
```

Install CSS and JS dependecies
```
npm install
```

Configure the app (.env)
```
cp .env.exemple .env
```

```
nano .env
```
> Set app_name, and db informations in the .env

Generate key
```
php artisan key:generate
```

Migrate db
```
php artisan migrate --seed
```

Compile JS and CSS
```
npm run dev
```

or for production environnement
```
npm run prod
```



Enjoy !


## What is done

Here is the list of which endpoint are wroking atm.

| Endpoint | Status |
| ---  | --- |
| GET /rentals | Done |

## Contributing

Thank you for considering contributing to BookingSync Fake API! Contact us if you want to contribute.

<style>
table {
    width:100%;
}
</style>
