<!DOCTYPE html>
<html>
    <head>
        <title>PHP Hello World</title>
    </head>
    <body>
        <?php
            require_once __DIR__ . '/../vendor/autoload.php';
            use Monolog\Logger;
            use Monolog\Handler\StreamHandler;

            $conn = null;
            
            $log = new Logger('name');
            $log->pushHandler(new StreamHandler('./somelog.log', Logger::DEBUG));

            try {
                $conn = new mysqli("mysql", "myuser", "mypassword", "mydatabase");
                $log->warning("MySQL Connected successfully");
            } catch (Exception $e) {
                $log->error("Connection failed: " . $e->getMessage() . $conn->connect_error);
            }
            
            if ($conn && $conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $result = $conn->query("SELECT * FROM users");

            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>id: " . $row["id"] . " " . $row["name"] . " " . $row["surname"] ."</li>";
                }
                echo "</ul>";
            } else {
                echo "No results found.";
            }

            $conn -> close();
            $log->warning("MySQL Closed successfully");
        ?>
    </body>
</html>