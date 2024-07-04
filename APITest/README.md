1. get clone of git repository
2. Add local database credentials in .env file(We do not need any table, just to run project we need it)
3. Open postman  : Add Request :
URL :http://127.0.0.1:8000/api/sale/rule3
Type : POST
Body : raw -> json -> {"product_ids":  [-, -, -, 20, 30, 40, 50, 50, 50, 60]}
Click on Send button & check the ouput
