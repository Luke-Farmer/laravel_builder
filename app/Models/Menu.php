<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function parent() {

        return $this->hasOne('menus', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('menus', 'parent_id', 'id');

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();
    }
}
