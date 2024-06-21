<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

class LearningController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index()
    {
        $users = $this->fetchTable('Users')->find()->all();

        $this->set('hasUsers', true);
        $this->set(compact('users'));
    }

    public function variables()
    {
        $this->set('url', '/variables');
        $this->render('/Learning/index');
    }

    public function mysql()
    {
        $this->set('url', '/mysql');
        $this->render('/Learning/index');
    }

    public function echoPrint()
    {
        $this->set('url', '/echo-print');
        $this->render('/Learning/index');
    }

    public function dataTypes()
    {
        $this->set('url', '/data-types');
        $this->render('/Learning/index');
    }

    public function strings()
    {
        $this->set('url', '/strings');
        $this->render('/Learning/index');
    }

    public function numbers()
    {
        $this->set('url', '/numbers');
        $this->render('/Learning/index');
    }

    public function casting()
    {
        $this->set('url', '/casting');
        $this->render('/Learning/index');
    }

    public function math()
    {
        $this->set('url', '/math');
        $this->render('/Learning/index');
    }

    public function constants()
    {
        $this->set('url', '/constants');
        $this->render('/Learning/index');
    }

    public function magicConstants()
    {
        $this->set('url', '/magic-constants');
        $this->render('/Learning/index');
    }

    public function operators()
    {
        $this->set('url', '/operators');
        $this->render('/Learning/index');
    }

    public function ifElse ()
    {
        $this->set('url', '/if-else ');
        $this->render('/Learning/index');
    }

    public function switch()
    {
        $this->set('url', '/switch');
        $this->render('/Learning/index');
    }

    public function loops()
    {
        $this->set('url', '/loops');
        $this->render('/Learning/index');
    }

    public function functions()
    {
        $this->set('url', '/functions');
        $this->render('/Learning/index');
    }

    public function arrays()
    {
        $this->set('url', '/arrays');
        $this->render('/Learning/index');
    }

    public function superGlobals()
    {
        $this->set('url', '/super-globals');
        $this->render('/Learning/index');
    }

    public function classes()
    {
        $this->set('url', '/classes');
        $this->render('/Learning/index');
    }

    public function exceptions()
    {
        $this->set('url', '/exceptions');
        $this->render('/Learning/index');
    }

    public function regExp()
    {
        $this->set('url', '/regex');
        $this->render('/Learning/index');
    }
}
