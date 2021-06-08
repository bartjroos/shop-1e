<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function buy(Product $product)
    {
        return $product;

        //Maak een order in de database
        //Stuur naar iDEAL pagina
        //Check of betalen is gelukt
        //Zet orderstatus op betaald
    }
}
