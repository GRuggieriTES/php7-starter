const editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    mode: "application/x-httpd-php",
    theme: "monokai",
    matchBrackets: true,
    styleActiveLine: true,
    extraKeys: {"Ctrl-Space": "autocomplete"}
});

document.getElementById('run').addEventListener('click', async (e) => {
    e.preventDefault();
    const code = editor.getValue();

    try {
        const response = await fetch('../run.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'code=' + encodeURIComponent(code),
        })

        if(!response.ok) {
            throw new Error('Server error: ' + response.message);
        }

        const data = await response.json();

        document.getElementById('output').innerHTML = data.output;
        document.getElementById('console-output').textContent = data.console;
    } catch (error) {
        document.getElementById('console-output').textContent = error;
    }
});
