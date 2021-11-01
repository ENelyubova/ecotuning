<?php


use PhpOffice\PhpSpreadsheet\IOFactory;

class UploadPrice extends CFormModel
{
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 'types' => 'xls'],
        ];
    }

    public function process($file)
    {
        $array = IOFactory::load($file);
        foreach ($array->getActiveSheet()->toArray() as $item) {
            $id = $item[0];
            $price = $item[2];
            if (mb_strlen($id) === 32 and !empty($price)) {
                $price = str_replace([',', ' ', '€'], '', $price);
                Product::model()->updateAll([
                    'price_euro' => $price
                ], [
                    'condition' => 'external_id = :external_id',
                    'params' => [
                        ':external_id' => $id,
                    ]
                ]);
            }
        }
    }
}