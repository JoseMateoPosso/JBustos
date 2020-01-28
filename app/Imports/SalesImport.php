<?php

namespace App\Imports;

use App\Sales;
use App\Nick;
use App\Page;
use App\Modelo;
use App\ModelsCouple;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SalesImport implements ToCollection
{
    private $idPage;

    public function __construct($data)
    {
        $this->idPage = $data;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $page = Page::find($this->idPage);

        $value = $this->toNum($page->column_value);
        $nick = $this->toNum($page->column_nick);
        $type = $page->category_id;


        foreach ($rows as $row)
        {
            if(isset($row[$nick]) && isset($row[$value])){
                /*dd($row[$value]);*/
                $sales = new Sales;
                $nickModel = Nick::where('nickname',$row[$nick])
                                 ->where('page_id',$page->id)
                                 ->select('nicks.*')
                                 ->first();
                /*dd($nickModel);*/
                if(isset($nickModel)){

                    if($type == 13){
                        $sales->tokens = $row[$value];
                        $sales->dollars = $row[$value] * 0.05;
                    }else if($type == 14){
                        $sales->dollars = $row[$value];
                    }
                    $sales->nick_id = $nickModel->id;
                    $sales->page_id = $nickModel->page_id;
                    if($nickModel->ownable_type == "App\Modelo"){
                        $modelInfo = Modelo::find($nickModel->ownable_id);
                        $sales->sede_id = $modelInfo->sede_id;
                    }else{
                        $coupleInfo = ModelsCouple::find($nickModel->ownable_id);
                        $sales->sede_id = $coupleInfo->modeloinfo->sede_id;
                    }
                    $sales->sales_date = date('Y-m-d');

                    $sales->save();
                }

            }
        }
    }

    private function toNum($data) {
        $alphabet = array( 'A', 'B', 'C', 'D', 'E',
                           'F', 'G', 'H', 'I', 'J',
                           'K', 'L', 'M', 'N', 'O',
                           'P', 'Q', 'R', 'S', 'T',
                           'U', 'V', 'W', 'X', 'Y',
                           'Z'
                           );
        $alpha_flip = array_flip($alphabet);
        $return_value = -1;
        $length = strlen($data);
        for ($i = 0; $i < $length; $i++) {
            $return_value += ($alpha_flip[$data[$i]] + 1) * pow(26, ($length - $i - 1));
        }
        return $return_value;
    }
}
