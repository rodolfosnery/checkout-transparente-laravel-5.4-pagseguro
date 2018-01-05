<?php

namespace App;

class Cart
{
        private $items;

        public  function __construct()
        {
            $this->items = [];
        }


        public function add($id, $titulo, $codigo, $preco, $slug, $file_name, $tamanho, $tamanhoid)
        {

            $this->items += [

                $id => [

                    'qtd' => isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']++ : 1,
                    'titulo' => $titulo,
                    'codigo' => $codigo,
                    'preco' => $preco,
                    'tamanho' => $tamanho,
                    'tamanhoid' => $tamanhoid,
                    'slug' => $slug,
                    'file_name' => $file_name
                ]
            ];

            return $this->items;

        }

        public function addPro($id, $titulo, $codigo, $preco, $slug, $file_name, $tamanho, $tamanhoid, $cartpro)
        {

            $this->items += [

                $id => [

                    'qtd' => isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']++ : 1,
                    'titulo' => $titulo,
                    'codigo' => $codigo,
                    'preco' => $preco,
                    'tamanho' => $tamanho,
                    'tamanhoid' => $tamanhoid,
                    'cartpro' => $cartpro,
                    'slug' => $slug,
                    'file_name' => $file_name
                ]
            ];

            return $this->items;

        }


        public function remove($id)
        {
            unset($this->items[$id]);
        }

        public function tamanho()
        {
            $tamanho_cart = [];
            foreach($this->items as $items){
                $tamanho_cart = $items['tamanho'];
            }
            return $tamanho_cart;
        }


        public function all()
        {
            return $this->items;
        }

        public function getTotal()
        {
            $total = 0;
            foreach($this->items as $item)
            {
                $total += $item['qtd'] * $item['preco'];
            }
            return $total;
        }


        public function clear()
        {
            $this->items = [];
        }

}
