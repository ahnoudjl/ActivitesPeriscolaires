

serve:
	php artisan serve

cont: 
	php artisan make:controller $(n) --resource 

route:
	php artisan route:list

mod:
	php artisan make:model $(n) -m