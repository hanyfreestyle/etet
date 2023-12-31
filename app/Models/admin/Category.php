<?php

namespace App\Models\admin;


use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    //use SoftDeletes;
    use Translatable;
    use HasRecursiveRelationships;

    public $translatedAttributes = ['name','slug','des','g_title','g_des','body_h1','breadcrumb'];
    protected $fillable = ['parent_id','photo','photo_thum_1','is_active'];
    protected $table = "categories";
    protected $primaryKey = 'id';
    protected $translationForeignKey = 'category_id';


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #     scopeRoot
    public function scopeRootCategory(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #  Web_Shop_Def_Query
    public function scopeWeb_Shop_Def_Query(Builder $query): Builder
    {
        return $query
            ->where('cat_shop',true)
            ->where('is_active',true)
            ->with('translations');

    }

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #     children
    public function web_shop_children():hasMany
    {
        return $this->hasMany(Category::class , 'parent_id', 'id' )
            ->where('cat_shop',true)
            ->where('is_active',true)
            ->with('category_with_product_shop')
            ->withCount('category_with_product_shop')
            ->orderBy('postion_shop','ASC')
            ->with('translations');
    }

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    #|||||||||||||||||||||||||||||||||||||| #  category_with_product_shop
    public function category_with_product_shop()
    {
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id')
            ->where('is_active',true)
            ->where('is_archived',false)
            ->where('pro_shop',true)
            ->with('translation')
            ;
    }


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    public function recursive_product_shop()
    {
        return $this->belongsToManyOfDescendantsAndSelf(Product::class, 'product_category')
            ->with('translation')
            ->with('product_with_category')
            ->where('pro_shop',true)
            ->where('is_active',true)
            ->where('is_archived',false);
    }

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #  Web_Shop_Def_Query
    public function scopeWebSite_Def_Query(Builder $query): Builder
    {
        return $query
            ->where('cat_web',true)
            ->where('cat_web_data',true)
            ->where('is_active',true)
            ->with('translations');

    }


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #     children
    public function website_children():hasMany
    {
        return $this->hasMany(Category::class , 'parent_id', 'id' )
            ->where('cat_web',true)
            ->where('cat_web_data',true)
            ->where('is_active',true)
            ->with('category_with_product_website')
            ->withCount('category_with_product_website')
            ->orderBy('postion_web','ASC')
            ->with('translations');
    }


#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    #|||||||||||||||||||||||||||||||||||||| #  category_with_product_website
    public function category_with_product_website()
    {
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id')
            ->where('is_active',true)
            ->where('is_archived',false)
            ->where('pro_web',true)
            ->where('pro_web_data',true)
            ->with('translation')
            ;
    }

    #@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    #|||||||||||||||||||||||||||||||||||||| #     table_data
    public function table_data():hasMany
    {
        return $this->hasMany(CategoryTable::class , 'category_id', 'id' )
            ->where('is_active',true)
            ->with('translation')
            ->with('attributeName')
            ->orderBy('postion');
    }




#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    public function scopeAdmin_Def_Shop_query(Builder $query): Builder
    {
        return $query->with('translations')
            ->withCount('admin_children_shop');

    }

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #     children
    public function admin_children_shop():hasMany
    {
        return $this->hasMany(Category::class , 'parent_id', 'id' )
            ->where('cat_shop',true)
            ->with('translations');
    }




#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #
    public function scopeAdmin_Def_Web_Query(Builder $query): Builder
    {
        return $query->with('translations')
            ->withCount('admin_children_web');

    }

#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
#|||||||||||||||||||||||||||||||||||||| #     children
    public function admin_children_web():hasMany
    {
        return $this->hasMany(Category::class , 'parent_id', 'id' )
            ->where('cat_web',true)
            ->where('cat_web_data',true)
            ->with('translations');
    }



}


/*

     public function countTotalProducts()
      {
          $query = DB::table('categories')->selectRaw('categories.*')->where('id', $this->id)->unionAll(
              DB::table('categories')->selectRaw('categories.*')->join('tree', 'tree.id', '=', 'categories.parent_id')
          );

          $tree = DB::table('products')->withRecursiveExpression('tree', $query)
              ->join('product_category', 'product_category.product_id', '=', 'products.id')
              ->whereIn(
                  'product_category.category_id',
                  DB::table('tree')->select('id')
              )
              ->count('products.id');

          return $tree;
      }
*/

