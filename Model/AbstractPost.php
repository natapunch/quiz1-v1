<?php

namespace Model;

/**
 *Pодительский класс с интерфейсом Renderable
 */
abstract class AbstractPost implements Renderable
{
    protected $options = [];
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * Вывод свойств объектов в строку
     * Реализация метода render() интерфейса
     * @return string
     */
    public function render():string
    {
        $string='';
        foreach ($this->options as $key => $value){
            $string.= '<h1>'.$key.' : <span style="color:green;">'.$value .'</span></h1>' ;
        }
        return $string;
    }
}