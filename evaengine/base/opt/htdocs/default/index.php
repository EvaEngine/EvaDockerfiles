<?php
$action = @$_GET['action'];
if ($action == 'phpinfo') {
    phpinfo();
    exit();
}
$serverVars = '';
foreach ($_SERVER as $_server_key => $_server_val) {
    $serverVars .= "<tr><td>{$_server_key}</td><td>{$_server_val}</td></tr>";
}
$loaded_extensions = get_loaded_extensions();
$phpExtContents = '';
foreach ($loaded_extensions as $extension) {
    $phpExtContents .= "<li><i class='iconfont' style='color:#33475f;'>&#xe607;</i> ${extension}</li>";
}
$css = [
    'production' => [
        'width' => '210px',
        'margin-right' => '74px'
    ]
];
$projectUrl = getenv('PROJECT_URL');
if (!empty($projectUrl)) {
    $css['production'] = [
        'width' => '180px',
        'margin-right' => '24px'
    ];
}
$handle = opendir(".");
$projectsListIgnore = ['.', '..', 'phpMemAdmin', 'phpRedisAdmin', 'phpmyadmin', 'phpMyAdmin'];
$projectContents = '';
while ($file = readdir($handle)) {
    if (is_dir($file) && !in_array($file, $projectsListIgnore)) {
        $projectContents .= "<li><a href='{$file}' target='_blank'><i class='iconfont'>&#xe60a;</i> {$file}</a></li>";
    }
}
closedir($handle);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive product landing page.">
    <title>EvaEngine Docker Container</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <style>

        @font-face {
            font-family: 'iconfont';
            src: url('//at.alicdn.com/t/font_1427197139_528717.eot'); /* IE9*/
            src: url('//at.alicdn.com/t/font_1427197139_528717.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('//at.alicdn.com/t/font_1427197139_528717.woff') format('woff'), /* chrome、firefox */ url('//at.alicdn.com/t/font_1427197139_528717.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/ url('//at.alicdn.com/t/font_1427197139_528717.svg#iconfont') format('svg'); /* iOS 4.1- */
        }

        .iconfont {
            font-family: "iconfont";
            /*font-size: 16px;*/
            font-style: normal;
        }

        .iconfont-l {
            font-size: 128px;
        }

        body, button, input, select, textarea, a {
            color: #666666;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            width: 1024px;
            margin: 0 auto;
        }

        .main-nav {
            height: 55px;
            background-color: #262635;
        }

        .main-nav .pure-menu-link {
            color: #757393;
            background: none;
        }

        .main-nav .pure-menu-link:hover {
            color: white;
        }
        .productions-wrap {
            width: 860px;
            margin: 0 auto;
        }

        .production {
            float: left;
            margin-right: <?php echo $css['production']['margin-right']; ?>;
            width: <?php echo $css['production']['width']; ?>;

            border: 1px solid #efefef;
            box-shadow: #ddd 3px 3px 3px
        }

        .production:hover {
            border: 1px solid #ddd;
            box-shadow: #aaa 3px 3px 3px
        }

        .production .icon {
            height: 208px;
            padding-top: 30px;
        }

        .production .name {
            background: #eee;
            height: 48px;
            line-height: 48px;
            text-align: center;
        }

        .production .iconfont-l {
            display: block;
            width: 128px;
            margin: 0 auto;
        }

        .clearfix:before,
        .clearfix:after,
        .container:before,
        .container:after {
            display: table;
            content: " ";
        }

        .clearfix:after,
        .container:after {
            clear: both;
        }

        .loaded-extensions {
            background: #eee;
            padding: 12px 24px;
            list-style: none;
        }

        .loaded-extensions li {
            float: left;
            width: 180px;
            height: 28px;
        }

        ul.folders {
            list-style: none;
            padding: 0;
        }

        ul.folders li {
            height: 24px;;
        }

        ul.folders a {
            color: #33475f;
            text-decoration: none;
        }

        ul.folders a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<nav class="main-nav">
    <div class="pure-menu pure-menu-horizontal pure-menu-scrollable container">
        <a href="#" class="pure-menu-link pure-menu-heading" style="color: white;">EvaEngine Docker Container</a>
        <ul class="pure-menu-list" style="float:right;">
            <li class="pure-menu-item"><a href="?action=phpinfo" class="pure-menu-link" target="_blank">phpinfo()</a></li>
            <li class="pure-menu-item">
                <a href="https://github.com/evaengine/evaengine" target="_blank" class="pure-menu-link">EvaEngine</a>
            </li>
            <li class="pure-menu-item"><a href="https://github.com/EvaEngine/EvaDockerfiles"  target="_blank"  class="pure-menu-link"><i
                        class="iconfont">&#xe606;</i></a></li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top: 48px;">
    <div class="productions-wrap clearfix">
        <?php if (!empty($projectUrl)): ?>
            <a href="<?php echo $projectUrl; ?>" target="_blank">
                <div class="production">
                    <div class="icon">
                        <i class="iconfont iconfont-l" style="color:#9d55b8;">&#xe608;</i>
                    </div>
                    <div class="name">
                        Project
                    </div>
                </div>
            </a>
        <?php endif; ?>
        <a href="/phpRedisAdmin/" target="_blank">
            <div class="production">
                <div class="icon">
                    <i class="iconfont iconfont-l" style="color:#eb4f38;">&#xe601;</i>
                </div>
                <div class="name">
                    phpRedisAdmin
                </div>
            </div>
        </a>
        <a href="/phpmyadmin/" target="_blank">
            <div class="production">
                <div class="icon">
                    <i class="iconfont iconfont-l" style="color:#56abe4;">&#xe603;</i>
                </div>
                <div class="name">
                    phpmyadmin
                </div>
            </div>
        </a>
        <a href="/phpMemAdmin/web/" target="_blank">
            <div class="production">
                <div class="icon">
                    <i class="iconfont iconfont-l" style="color:#00bb9c;">&#xe600;</i>
                </div>
                <div class="name">
                    phpMemAdmin
                </div>
            </div>
        </a>

    </div>
</div>
<div style="background: #ebebed; width: 100%;margin-top: 48px;">

</div>
<div class="container">
    <div class="pure-g">
        <div class="pure-u-1">
            <h2>SERVER INFORMATION</h2>
            <table class="pure-table pure-table-striped" style="width: 100%; margin-bottom: 24px;">
                <thead>
                <tr>
                    <th>NAME</th>
                    <th>VALUE</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><i class="iconfont" style="font-size: 24px;">&#xe605;</i> PHP Version</td>
                    <td><?php echo phpversion(); ?></td>
                </tr>
                <tr>
                    <td><i class="iconfont" style="font-size: 24px;">&#xe604;</i> Web Server software</td>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
                </tr>
                <tr>
                    <td><i class="iconfont" style="font-size: 24px;">&#xe605;</i> Phalcon Framework Version</td>
                    <td><?php echo class_exists('Phalcon\Version') ? Phalcon\Version::get() : ''; ?></td>
                </tr>

                </tbody>
            </table>
            <h2 style="margin-top: 48px;">LOADED EXTENSIONS</h2>

            <ul class="loaded-extensions clearfix">
                <?php echo $phpExtContents; ?>
            </ul>
            <h2 style="margin-top: 48px;">FOLDERS</h2>

            <ul class="clearfix folders">
                <?php echo $projectContents; ?>
            </ul>
            <h2 style="margin-top: 48px;">PHP $_SERVER</h2>
            <table class="pure-table pure-table-striped" style="width: 100%;">
                <thead>
                <tr>
                    <th>KEY</th>
                    <th>VALUE</th>
                </tr>
                </thead>
                <tbody>
                <?php echo $serverVars; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>


