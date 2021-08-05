# Onubrooks' Meal Recommender API

Welcome to the meal recommender API of choice for many across board. This project demonstrates how to search, filter and recommend meals to users based on their allergies (we don't want them reacting in a strange way to our foods, do we?). Users of the API can add, edit and fetch their meals, meal items and allergies.
This project is live on [Heroku Meal Recommender](https://meal-recommender-api.herokuapp.com).

**Features of the API:**

1. The system operates on three Allergies:
    1. Nut Allergy
    2. ShellFish Allergy
    3. SeaFood Allergy
2. Every user on the system is able to pick their allergies (ranging from zero to all the allergies provided by the system).
3. The system accommodates at least 50 meals (Each meal has a main item & at least 2 side items) at any time (with allergies for these meals)
4. The system has the ability to recommend meals to users based on their allergies. Every user has the ability to fetch meal recommendations at any time.
5. The system can also fetch meal recommendations for more than one user at a time.

## How it works

With a simple API call, all you need to do is create one or more users:

```curl
curl --request POST \
    "https://meal-recommender-api.herokuapp.com/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Idris Elba\",
    \"email\": \"elba@onubrooks.io\",
    \"password\": \"password\",
    \"password_confirmation\": \"password\"
}"
```

Then add their allergies:

```curl
curl --request POST \
    "https://meal-recommender-api.herokuapp.com/api/user-allergies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 3,
    \"allergies\": [
        {
            \"allergy_id\": 1
        }
    ]
}"
```

And that's it. Recommendations can then be fetched via POST requests on the API.

```curl
curl --request POST \
    "https://meal-recommender-api.herokuapp.com/api/recommend/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1
}"
```

Below is a sample recommendation for a user with Nut Allergy:

```json
{
    "status": "success",
    "message": "fetch recommendations successful",
    "data": {
        "user": {
            "id": 1,
            "name": "Brad Pitt",
            "email": "pit@onubrooksapi.com"
        },
        "recommended_meals": [
            {
                "id": 3,
                "name": "akpu and Ewedu",
                "description": "special akpu from the eastern part of Nigeria",
                "items": [...]
            },
            {
                "id": 4,
                "name": "pounded yam and Ewedu",
                "description": "special pounded yam from the southern part of Nigeria",
                "items": [...]
            },
            {
                "id": 5,
                "name": "Eba and Okra",
                "description": "special garri cake with okra soup",
                "items": [...]
            }
        ]
    }
}
```

## Project Setup

Start by cloning the project using the following command:

`git clone https://github.com/onubrooks/meal-recommender-api.git`

Next install dependencies:

`composer install`

After installation, if you already have a database setup, you can run migrations as follows:

`php artisan migrate`

After successful migration, you are ready to give the API a go, break a leg!

## API Documentation

Full documentation can be found in the following links:

1. OpenAPI 2.0 specificaiton compliant API documentation: [Meal Recommender](https://meal-recommender-api.herokuapp.com/docs).
2. Postman documentation with real request and response examples at: [Meal Recommender Collection](https://documenter.getpostman.com/view/4758703/Tzsik4Jg).
3. Technical specification and data architecture design can be found [here](https://documenter.getpostman.com/view/4758703/Tzsik4Jg).

## About Onubrooks

My name is Onuh Abah and you can find more of my work [here](https://github.com/onubrooks). Let's catch up on social media via [twitter](https://twitter.com/onubrooks) and [linkedin](https://www.linkedin.com/in/onu-abah)
