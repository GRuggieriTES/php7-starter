<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            CakePHP: the rapid development PHP framework:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css([
            'normalize.min',
            'milligram.min',
            'fonts',
            'cake',
            'home',
            'learning',
            'codemirror/codemirror',
            'codemirror/monokai',
            'codemirror/show-hint'
        ]) ?>
        <?= $this->Html->script([
            'codemirror/codemirror',
            'codemirror/active-line',
            'codemirror/show-hint',
            'codemirror/matchbrackets',
            'codemirror/htmlmixed',
            'codemirror/xml',
            'codemirror/javascript',
            'codemirror/css',
            'codemirror/clike',
            'codemirror/php'
        ]) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <header>
            <div class="container text-center">
                <a href="https://cakephp.org/" target="_blank" rel="noopener">
                    <img alt="CakePHP" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="150" style="margin:0;" />
                </a>
                <h4 class="">
                    Welcome to the Learning Zone
                </h4>
            </div>
        </header>
        <nav class="primary-nav">
            <ul>
                <li><a href="/learning">Learning Home</a></li>
                <li><a href="/learning/variables">Variables</a></li>
                <li><a href="/learning/varScope">Variable Scope</a></li>
                <li><a href="/learning/echoPrint">Echo and Print</a></li>
                <li><a href="/learning/dataTypes">Data Types</a></li>
                <li><a href="/learning/strings">Strings</a></li>
                <li><a href="/learning/numbers">Numbers</a></li>
                <li><a href="/learning/casting">Casting</a></li>
                <li><a href="/learning/math">Math</a></li>
                <li><a href="/learning/constants">Constants</a></li>
                <li><a href="/learning/magicConstants">Magic Constants</a></li>
                <li><a href="/learning/operators">Operators</a></li>
                <li><a href="/learning/ifElse">if else esleif</a></li>
                <li><a href="/learning/switch">Switch</a></li>
                <li><a href="/learning/loops">Loops</a></li>
                <li><a href="/learning/functions">Functions</a></li>
                <li><a href="/learning/classes">Classes</a></li>
                <li><a href="/learning/exceptions">Exceptions</a></li>
                <li><a href="/learning/arrays">Arrays</a></li>
                <li><a href="/learning/superGlobals">SuperGlobals</a></li>
                <li><a href="/learning/regExp">RegEx</a></li>
            </ul>
        </nav>
        <main class="main learning">
            <?php if (isset($hasUsers)): ?>
                <?= $this->cell('Users') ?>
            <?php endif ?>

            <form method="POST">
                <textarea id="code" name="code">
                    <?php echo $code; ?>
                </textarea>
                <input id="run" type="submit" value="Run">
            </form>

            <p>Output:</p>
            <div id="output">
                ...
            </div>
            <div id="console-output">...</div>
        </main>
        <?= $this->Html->script(['learning']) ?>
    </body>
</html>
