<?php

namespace Model;

/**
 * Interface Renderable
 * @package Model
 */

interface Renderable
{
    /**
     * Returns object in string type
     * @return string
     */
    function render (): string;
}