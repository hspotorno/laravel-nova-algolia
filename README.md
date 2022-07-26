# Laravel Nova Algolia

## Local setup
1. copy .env.example to .env
2. add auth.json for laravel nova
3. setup local mysql db called `novatest`
4. setup local domain (nova.test)
5. add .env values for Algolia
6. Login to nova http://nova.test/nova

Username: user@example.com
Password: password

## DB Design

We have three main models related to the problem:
- Product
- Ingredient
- Merchant

And one pivot table for IngredientProduct

The pivot table has three columns: `ingredient_id`, `product_id`, `merchant_id`
The `merchant_id` is needed for an additional column `order_column` that will be needed for custom sorting later

## Goal

When attaching a product to an ingredient, we need to include the selected merchant from the filter to algolia query, so we only get products from the selected merchant.

1. Visit http://nova.test/nova/resources/ingredients/1
2. Select a merchant from the filter e.g. `Superstore`
3. Click `Attach Product`
4. The searchable product field should only show products from the selected merchant

## Possible ways to solve the problem

- Pass merchant_id from the filter to the attach screen through a query parameter and change the scoutQuery
- Perfect would be to pass the selected merchant and also replace the search dropdown/select with a custom component, so we could implement Algolias Vue InstantSearch and add all the facet filters in the custom component.
