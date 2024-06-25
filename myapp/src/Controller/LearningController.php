<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;
use Cake\Log\Log;

class LearningController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->logger = Log::engine('default');
    }

    public function index()
    {
        $users = $this->fetchTable('Users')->find()->all();

        $this->set('code', '');
        $this->set('hasUsers', true);
        $this->set(compact('users'));
    }

    public function variables()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'variables'
        ]);

$code = '
<?php
    echo "<h4>Variable types:</h4>";
    $integer = 5;      // is an integer
    $string = "John";  // is a string
    $boolean = true;   // is a boolean

    echo $integer;
    echo "<br>";
    echo $string;
    echo "<br>";
    echo $boolean;

    echo "<br>";
    $txt = "www.tes.com";
    echo "I love $txt!";

    echo "<br>";
    $x = 5;
    $y = 4;

    echo $x + $y;

    echo "<h4>Using var_dump:</h4>";

    $x = 5;
    var_dump($x);
    var_dump(5);
    var_dump("John");
    var_dump(3.14);
    var_dump(true);
    var_dump([2, 3, 56]);
    var_dump(NULL);

    echo "<h4>All three variables get the value \"Fruit\":</h4>";
    $x = $y = $z = "Fruit";
    echo $x;
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function varScope()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'varScope'
        ]);

$code = '
<?php
    $x = 5; // global scope

    function myTest() {
    // using x inside this function will generate an error
    echo "<p>Variable x inside function is: $x</p>";
    }
    myTest();

    echo "<p>Variable x outside function is: $x</p>";
?>
';
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function mysql()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'mysql'
        ]);

        $this->set('url', '/mysql');
        $this->render('/Learning/index');
    }

    public function echoPrint()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'echoPrint'
        ]);

$code = '
<?php
    $hello = "Hello, world!";
    $someArray = ["one", "two", 3];
    print_r("concatination with $hello");
    echo "</br>";

    print_r("concatination with " . $hello);
    echo "</br>";

    print_r("<h2> $hello </h2>");
    echo "</br>";

    print_r($someArray);
    var_dump($someArray);
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function dataTypes()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'dataTypes'
        ]);

$code = '
<?php
    $x = "Hello world!";

    var_dump($x);

    $x = 5985;
    var_dump($x);

    $x = 10.365;
    var_dump($x);

    $x = true;
    var_dump($x);


    $cars = array("Volvo","BMW","Toyota");
    var_dump($cars);

    class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    public function message() {
        return "My car is a " . $this->color . " " . $this->model . "!";
    }
    }

    $myCar = new Car("red", "Volvo");
    var_dump($myCar);

    $x = null;
    var_dump($x);

    $x = 5;
    $x = (string) $x;
    var_dump($x);

?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function strings()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'strings'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'numbers'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'regExp'
        ]);

$code = '
<?php
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "hello"; // String
    $d = true;    // Boolean
    $e = NULL;    // NULL

    $a = (string) $a;
    $b = (string) $b;
    $c = (string) $c;
    $d = (string) $d;
    $e = (string) $e;

    //To verify the type of any object in PHP, use the var_dump() function:
    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);

//=========================================================
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "25 kilometers"; // String
    $d = "kilometers 25"; // String
    $e = "hello"; // String
    $f = true;    // Boolean
    $g = NULL;    // NULL

    $a = (int) $a;
    $b = (int) $b;
    $c = (int) $c;
    $d = (int) $d;
    $e = (int) $e;
    $f = (int) $f;
    $g = (int) $g;

    //To verify the type of any object in PHP, use the var_dump() function:
    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);

//=========================================================
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "25 kilometers"; // String
    $d = "kilometers 25"; // String
    $e = "hello"; // String
    $f = true;    // Boolean
    $g = NULL;    // NULL

    $a = (float) $a;
    $b = (float) $b;
    $c = (float) $c;
    $d = (float) $d;
    $e = (float) $e;
    $f = (float) $f;
    $g = (float) $g;

    //To verify the type of any object in PHP, use the var_dump() function:
    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);

//=========================================================
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = 0;       // Integer
    $d = -1;      // Integer
    $e = 0.1;     // Float
    $f = "hello"; // String
    $g = "";      // String
    $h = true;    // Boolean
    $i = NULL;    // NULL

    $a = (bool) $a;
    $b = (bool) $b;
    $c = (bool) $c;
    $d = (bool) $d;
    $e = (bool) $e;
    $f = (bool) $f;
    $g = (bool) $g;
    $h = (bool) $h;
    $i = (bool) $i;

    //To verify the type of any object in PHP, use the var_dump() function:
    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);
    var_dump($f);
    var_dump($g);
    var_dump($h);
    var_dump($i);

//=========================================================
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "hello"; // String
    $d = true;    // Boolean
    $e = NULL;    // NULL

    $a = (array) $a;
    $b = (array) $b;
    $c = (array) $c;
    $d = (array) $d;
    $e = (array) $e;

    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);

//=========================================================
    class Car {
        public $color;
        public $model;
        public function __construct($color, $model) {
            $this->color = $color;
            $this->model = $model;
        }
        public function message() {
            return "My car is a " . $this->color . " " . $this->model . "!";
        }
    }

    $myCar = new Car("red", "Volvo");

    $myCar = (array) $myCar;
    var_dump($myCar);

//=========================================================
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "hello"; // String
    $d = true;    // Boolean
    $e = NULL;    // NULL

    $a = (object) $a;
    $b = (object) $b;
    $c = (object) $c;
    $d = (object) $d;
    $e = (object) $e;

    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);

//=========================================================
    $a = array("Volvo", "BMW", "Toyota"); // indexed array
    $b = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); // associative array

    $a = (object) $a;
    $b = (object) $b;

    var_dump($a);
    var_dump($b);

//=========================================================
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "hello"; // String
    $d = true;    // Boolean
    $e = NULL;    // NULL

    $a = (unset) $a;
    $b = (unset) $b;
    $c = (unset) $c;
    $d = (unset) $d;
    $e = (unset) $e;

    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
    var_dump($e);
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function math()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'math'
        ]);

$code = '
<?php
    echo(pi());
    echo "<br>";
    echo(min(0, 150, 30, 20, -8, -200));
    echo "<br>";
    echo(max(0, 150, 30, 20, -8, -200));
    echo "<br>";
    echo(abs(-6.7));
    echo "<br>";
    echo(sqrt(64));
    echo "<br>";
    echo(round(0.60));
    echo(round(0.49));
    echo "<br>";
    echo(rand());
    echo "<br>";
    echo(rand(10, 100));
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function constants()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'constants'
        ]);

$code = '
<?php
    define("GREETING", "Welcome to tes.com!");
    echo GREETING;
    echo "<br>";
    define("GREETING", "Welcome to tes.com!", true);
    echo greeting;
    echo "<br>";
    const MYCAR = "Volvo";
    echo MYCAR;
    echo "<br>";
    define("cars", [
    "Alfa Romeo",
    "BMW",
    "Toyota"
    ]);
    echo cars[0];
    echo "<br>";

    define("GREETING", "Welcome to tes.com!");

    function myTest() {
    echo GREETING;
    }

    myTest();
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function magicConstants()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'magicConstants'
        ]);

$code = '
<?php
    class Fruits {
    public function myValue(){
        return __CLASS__;
    }
    }
    $kiwi = new Fruits();
    echo $kiwi->myValue();

    echo "<br>";
    echo __DIR__;
    echo "<br>";
    echo __FILE__;
    echo "<br>";
    function myValue(){
    return __FUNCTION__;
    }
    echo myValue();
    echo "<br>";
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function operators()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'operators'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'ifElse'
        ]);

$code = '
<?php
    if (5 > 3) {
        echo "Have a good day!";
    }

    echo "<br>";

    $t = 14;

    if ($t < 20) {
        echo "Have a good day!";
    }
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function switch()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'switch'
        ]);

$code = '
<?php
    $favcolor = "red";

    switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
    }
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function loops()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'loops'
        ]);

$code = '
<?php
    for ($x = 0; $x <= 10; $x++) {
        echo "The number is: $x <br>";
    }

    echo "<br>";

    for ($x = 0; $x <= 10; $x++) {
        if ($x == 3) break;
        echo "The number is: $x <br>";
    }

    echo "<br>";

    for ($x = 0; $x <= 10; $x++) {
        if ($x == 3) continue;
        echo "The number is: $x <br>";
    }

    echo "<br>";

    for ($x = 0; $x <= 100; $x+=10) {
        echo "The number is: $x <br>";
    }

    echo "<br>";

    $colors = array("red", "green", "blue", "yellow");

    foreach ($colors as $x) {
        echo "$x <br>";
    }

    echo "<br>";

    $members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

    foreach ($members as $x => $y) {
        echo "$x : $y <br>";
    }

    echo "<br>";

    class Car {
        public $color;
        public $model;
        public function __construct($color, $model) {
            $this->color = $color;
            $this->model = $model;
        }
    }

    $myCar = new Car("red", "Volvo");

    foreach ($myCar as $x => $y) {
        echo "$x: $y <br>";
    }
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function functions()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'functions'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'arrays'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'superGlobals'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'classes'
        ]);

$code = '
<?php
    class Fruit {
        // Properties
        public $name;
        public $color;

        // Methods
        function set_name($name) {
            $this->name = $name;
        }
        function get_name() {
            return $this->name;
        }
    }

    $apple = new Fruit();
    $banana = new Fruit();
    $apple->set_name("Apple");
    $banana->set_name("Banana");

    echo $apple->get_name();
    echo "<br>";
    echo $banana->get_name();
?>
';
    
        $this->set('code', $code);
        $this->render('/Learning/index');
    }

    public function exceptions()
    {
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'exceptions'
        ]);

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
        $this->logger->info('server-side',[
            'controller' => 'learning',
            'action' => 'regExp'
        ]);

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
