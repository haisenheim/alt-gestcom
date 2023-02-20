<?php

namespace App\Imports;

use App\Models\Article;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportIntoCategory implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $category;
    protected $skus = [];
    protected $poids;


    public function __construct($id,$pp)
    {
        $this->category = Category::find($id);
        $this->poids = $pp;
        foreach($this->category->articles as $article){
            $this->skus[] = $article->sku;
        }
    }

    public function model(array $row)
    {
        if(in_array($row[0],$this->skus)){
            $article = Article::where('sku',$row[0])->where('category_id',$this->category->id)->first();

            $article->price = is_numeric($row[2])?$row[2]:0;
            $article->id;
            $article->user_id = auth()->user()->fournisseur_id;
            $article->save();

           return $article;
          /* return new Article([
              'id'=>$article->id,
              'name'=>$article->name,
               'sku'=>$row[0],
               'category_id'=>$this->category->id,
               'price'=>is_numeric($row[2])?$row[2]:0,
               'user_id' => auth()->user()->fournisseur_id,
               'image'=>$article->image,
           ]); */

        }else{
            return new Article([
                //
                'sku'=>$row[0]?$row[0]:'--',
                'name'=>$row[1]?$row[1]:'-',
                'price'=>is_numeric($row[2])?$row[2]:0,
                'category_id'=>$this->category->id,
                'user_id'=>auth()->user()->fournisseur_id,
                'is_active'=>is_numeric($row[2])?1:0,
                'image'=>''
            ]);
        }
    }
}
