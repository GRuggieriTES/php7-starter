<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code = $_POST['code'] ?? '';

        $filename = tempnam(sys_get_temp_dir(), 'code') . '.php';
        file_put_contents($filename, $code);

        ob_start();
        try {
            include $filename;
            $output = ob_get_clean();
            $console = '';
        } catch (Exception $e) {
            $output = ob_get_clean();
            $console = $e->getMessage();
        }

        echo json_encode(['output' => $output, 'console' => $console]);

        unlink($filename);
    }
?>
