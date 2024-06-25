<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';

    $filename = tempnam(sys_get_temp_dir(), 'code') . '.php';
    file_put_contents($filename, $code);

    $output = '';
    $error = '';

    ob_start();
    try {
        $command = "php -l $filename display_errors=1 -d error_reporting=E_ALL $filename 2>&1";
        $error = shell_exec($command);

        if (strpos($error, 'No syntax errors detected') === false) {
            $output = '<span style="color: #ccc;">Output</span>';
        } else {
            ob_start();
            include $filename;
            $output = ob_get_clean();
            $error = '<span style="color: #ccc;">Error</span>';
        }
    } catch (Exception $e) {
        $output = ob_get_clean();
        $error = $e->getMessage();
    }

    echo json_encode(['output' => $output, 'error' => $error]);

    unlink($filename);
}
?>
