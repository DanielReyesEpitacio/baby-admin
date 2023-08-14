<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashClosure extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'turn',
        'cash',
        'rappi',
        'terminal',
        'expenses',
        'tips',
        'notes',
    ];

    protected $hidden=[

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getSalesDataset(){
        $data = CashClosure::all();

        $dataset = [
            "dates"=>[],
            "items"=>[],
        ];
        
        foreach($data as $entity){
            $dataset["dates"][]=$entity->created_at;
            $dataset["items"]["Caja"][]=$entity->cash;
            $dataset["items"]["Rappi"][]=$entity->rappi;
            $dataset["items"]["Terminal"][]=$entity->terminal;
            $dataset["items"]["Gastos"][]=$entity->expenses;
        }

        return $dataset;
    }

    public static function getFilterSale($params){
        $query = CashClosure::query();
    
        if($params->filled('date')){
            $query->whereDate('created_at',$params->date);
        }

        if($params->filled('user_id')){
            $query->where('user_id',$params->user_id);
        }

        if($params->filled('turn')){
            $query->where('turn',$params->turn);
        }
        if($params->filled('month')){
            $query->whereMonth('created_at',$params->month);
        }
        $filterSale = $query->get();

        return $filterSale;
    }
}
