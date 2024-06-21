<?php
namespace App\View\Cell;

use Cake\View\Cell;

class VariablesCell extends Cell
{
    public function display()
    {
        $this->set('message', 'world');
    }
}
