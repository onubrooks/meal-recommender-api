# Onubrooks' Meal Recommender API Technical Specification

The system is built on a flexible database architecture, this makes it scalable and can easily be expanded to accomodate more requirements. Let's get started:

## Database Schema

### Entities

1. meals:
    1. id
    2. name
    3. description
    4. timestamps
2. items:
    1. id
    2. name
    3. description
    4. timestamps
3. allergies:
    1. id
    2. name
    3. description
    4. timestamps
4. users:
    1. id
    2. name
    3. email
    4. password
    5. timestamps

### Relationships

1. meal_items:
    1. meal_id
    2. item_id
    3. type: enum(main, side).
    4. timestamps
2. item_allergies:
    1. item_id
    2. allergy_id
    3. timestamps
3. user_allergies:
    1. user_id
    2. allergy_id
    3. timestamps

## Endpoints and Core Logic

The system is divided into 3 categories of endpoints: data, relationships and recommender.

### Data Management

This group contains logic to create, update and fetch entities: meals, items, allergies and users.
For example, to fetch meals, use `GET /api/meals` and to save or update, use `POST /api/meals`.
The same applies to the other entities.

### Relationship Management

This group contains logic for querying and manipulating relationships between the entities. The 3 relationships are `meal-items`, `item-allergies` and `user-allerges`.
Every meal has 3 or more item (1 main plus 2 or more side items). This relationship is captured in the `meal_items` table.
Every item has zero or more allergies. The `item_allergies` table holds this information.
Every user has zero or more allergies. The `user_allergies` table captures this association.

### Recomender

This group holds what the API is all about: Making recommendations!
Both endpoints perform the same base logic of fetching recommendations for a given user_id as follows:

- Fetch all of the users' allergies from the `user_allergies` table.
- Use the above allergies to fetch all items that have that allergy using the `item_allergies` table. Lets call these the *unsafe items*.
- Use the *unsafe items* to fetch the meals that would be affected from the `meal_items` table. We call these the *unsafe meals*.
- Finally, fetch all meals that are not *unsafe meals* and return as recommended meals.
