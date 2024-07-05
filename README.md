1. get clone of git repository
2. cd Diwali-Sale-Campaign
3. Run command : composer install
4. Run command : php artisan serve
5. Add local database credentials in .env file(We do not need any table, just to run project we need it)
6. Open postman  : Add Request :
   Rule 1 : http://127.0.0.1:8000/api/sale/rule1
   Rule 2 : http://127.0.0.1:8000/api/sale/rule2
   Rule 3 : http://127.0.0.1:8000/api/sale/rule3
URL : http://127.0.0.1:8000/api/sale/rule3
Type : POST
Body : raw -> json -> {"product_ids":  [-, -, -, 20, 30, 40, 50, 50, 50, 60]}
Click on Send button & check the ouput
![image](https://github.com/turkarkhushbu/Diwali-Sale-Campaign/assets/87687354/b334ec3a-0ad2-4b0f-bf5a-05bc229363c9)
