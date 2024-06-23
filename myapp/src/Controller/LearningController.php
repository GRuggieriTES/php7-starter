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
$code = '
<?php
    function helloWorld() {
        echo "Hello, world! variables";
    }

    helloWorld();
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function mysql()
    {
        $this->set('url', '/mysql');
        $this->render('/Learning/index');
    }

    public function echoPrint()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! echo print";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function dataTypes()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! data types";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function strings()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! strings";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function numbers()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! numbers";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function casting()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! casting";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function math()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! math";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function constants()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! constants";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function magicConstants()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! magic constants";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function operators()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! operators";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function ifElse ()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! if else esleif";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function switch()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! switch";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function loops()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! loops";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function functions()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! functions";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function arrays()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! arrays";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function superGlobals()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! superGlobals";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function classes()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! classes";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function exceptions()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! exceptions";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function regExp()
    {
        $code = '
        <?php
            function helloWorld() {
                echo "Hello, world! regExp";
            }
    
            helloWorld();
        ?>
            ';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }
}
