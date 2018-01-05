<?php

namespace App\Jobs;

use App\Estampa;
use App\Peca;
use Illuminate\Contracts\Bus\SelfHandling;

class PecaFormFields extends Job implements SelfHandling
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
        $peca = Peca::findOrFail($id);

        $fieldNames = array_keys(array_except($fields, ['estampas']));

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $peca->{$field};
        }


        $fields['estampas'] = $peca->estampas()->pluck('estampa')->all();


        return $fields;
    }

}
