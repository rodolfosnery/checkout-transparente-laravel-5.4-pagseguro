<?php

namespace App\Jobs;

use App\Estampa;
use App\Produto;
use Illuminate\Contracts\Bus\SelfHandling;

class ProdutoFormFields extends Job implements SelfHandling
{
    protected $id;

    protected $fieldList = [

        'estampas' => [],

    ];

    public function __construct($id = null)
    {
        $this->id = $id;
    }


    public function handle()
    {
        $fields = $this->fieldList;

        if ($this->id) {
            $fields = $this->fieldsFromModel($this->id, $fields);
        }

        foreach ($fields as $fieldName => $fieldValue) {
            $fields[$fieldName] = old($fieldName, $fieldValue);
        }

        return array_merge(
            $fields,
            ['allEstampas' => Estampa::pluck('estampa')->all()]

        );
    }

    protected function fieldsFromModel($id, array $fields)
    {
        $produto = Produto::findOrFail($id);

        $fieldNames = array_keys(array_except($fields, ['estampas']));

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $produto->{$field};
        }


        $fields['estampas'] = $produto->estampas()->pluck('estampa')->all();


        return $fields;
    }

}
