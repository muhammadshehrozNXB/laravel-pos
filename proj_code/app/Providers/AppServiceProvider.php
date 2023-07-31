<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductTypes\ProductTypeRepositoryInterface;
use App\Repositories\ProductTypes\ProductsTypeRepository;

use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\Products\ProductsRepository;

use App\Repositories\Suppliers\SuppliersRepositoryInterface;
use App\Repositories\Suppliers\SuppliersRepository;

use App\Repositories\Customers\CustomersRepositoryInterface;
use App\Repositories\Customers\CustomersRepository;

use App\Repositories\PurchaseOrder\PurchaseOrderRepositoryInterface;
use App\Repositories\PurchaseOrder\PurchaseOrderRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductTypeRepositoryInterface::class, ProductsTypeRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(SuppliersRepositoryInterface::class, SuppliersRepository::class);
        $this->app->bind(CustomersRepositoryInterface::class, CustomersRepository::class);
        $this->app->bind(PurchaseOrderRepositoryInterface::class, PurchaseOrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
