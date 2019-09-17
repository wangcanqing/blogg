<?php

namespace App\Model;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use ModelTree;
    protected $table = 'category';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
