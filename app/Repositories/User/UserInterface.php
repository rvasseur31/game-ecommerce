<?php

namespace App\Repositories\User;

interface UserInterface {
    public function isFavorite($product_id);
    public function addFavorite($product_id);
    public function removeFavorite($product_id);
}