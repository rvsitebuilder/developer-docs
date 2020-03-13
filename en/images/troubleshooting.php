<style>

body{
font-size:24px;
  background: rgb(255,255,255);
  color:#303030;
  font-family:Tahoma, Verdana;
}
.content-l {
   background:url(https://cdn.rvtheme.com/img/img_error.svg) no-repeat center center;
  background-size:80%;
  width:50%;
  float:left;
  height:100%;
  position:fixed;
  top:0;
  bottom:0;
  left:0;	
}
.content-r {
  background: #f1f3f2;
  width:50%;
  float:right;
  height:100%;
  position:fixed;
  top:0;
  bottom:0;
  right:0;
  overflow-y: auto;
}
.content-r .padd {
  padding:10% 8%;
}
 h1 {
  color: #f25a29;
  font-size:36px;
  margin-bottom:35px;
}
h2 {
  font-size:26px;
  color:#353535;
}
a.btn{
  background: #f25a29;
  color:#fff;
  display:block;
  padding:10px;
  width:100px;
  border-radius:100px;
  text-decoration:none;
  text-align:center;
  padding:2px 5px;
  margin-top:10px;
  font-size:18px;
  line-height:1.8em;
}
ul {
 color:#303030;
}
ul li{
 padding-bottom:15px;
 line-height:1.6em;
}

</style>
<?php

function show_solution_msg()
{
    echo '<div class="rvcontainer">';
    echo '<div class="content-l"></div>';
    echo '<div class="content-r"><div class="padd">';
    echo '<h1>This website is temporarily unavailable, please try again later.</h1>';
            
           

    $solution_lists = find_solution();
    echo '<h2>Troubleshooting:</h2>';
    echo '<ul>';
    if (count($solution_lists)) {
        foreach ($solution_lists as $solution) {
            printf('<li><strong></strong> %s <br/><strong></strong> %s</li>', $solution['msg'], $solution['solution']);
        }
    } else {
        echo 'Please use rvsitebuilder installer to repair website and check again., If not work please contact your provider.';
    }
    echo '</ul>';
    echo '</div></div>';
    echo '</div>';
}

// https://gitlab.rvglobalsoft.netway.pro/rvglobalsoft/rvsitebuildercms-real-setup/blob/develop/setupapiserver.php pre_check_php()
function find_solution()
{
    //require APP_DEBUG=false
    //TODO: check msg error to validation
    $error = error_get_last();
    $solution_lists = [];
    if (version_compare(PHP_VERSION, '7.1.3') < 0) {
        $solution_lists['version_not_match'] = [];
        $solution_lists['version_not_match']['msg'] = 'Your PHP version has not match'.PHP_VERSION.' but we require atleast 7.1.3';
        $solution_lists['version_not_match']['solution'] = 'Please see our Minimum Installation Requirements <br> <a href="https://rvsitebuilder.com/installation/" target="_blank" class="btn">HELP</a>';
    }

    //php extension
    if (!extension_loaded('json')) {
        $solution_lists['php_extension_json'] = [];
        $solution_lists['php_extension_json']['msg'] = 'Can not load PHP Extension (json)';
        $solution_lists['php_extension_json']['solution'] = 'Please enable json extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638954-Installation-issue-on-CloudLinux-System" target="_blank" class="btn">HELP</a>';
    }
    if (!extension_loaded('mysqlnd')) {
        $solution_lists['php_extension_mysqlnd'] = [];
        $solution_lists['php_extension_mysqlnd']['msg'] = 'Can not load PHP Extension (mysqlnd)';
        $solution_lists['php_extension_mysqlnd']['solution'] = 'Please enable mysqlnd extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (!extension_loaded('pdo')) {
        $solution_lists['php_extension_pdo'] = [];
        $solution_lists['php_extension_pdo']['msg'] = 'Can not load PHP Extension (pdo)';
        $solution_lists['php_extension_pdo']['solution'] = 'Please enable pdo extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (!extension_loaded('curl')) {
        $solution_lists['php_extension_curl'] = [];
        $solution_lists['php_extension_curl']['msg'] = 'Can not load PHP Extension (curl)';
        $solution_lists['php_extension_curl']['solution'] = 'Please enable curl extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (!extension_loaded('iconv')) {
        $solution_lists['php_extension_iconv'] = [];
        $solution_lists['php_extension_iconv']['msg'] = 'Can not load PHP Extension (iconv)';
        $solution_lists['php_extension_iconv']['solution'] = 'Please enable iconv extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (!extension_loaded('mbstring')) {
        $solution_lists['php_extension_mbstring'] = [];
        $solution_lists['php_extension_mbstring']['msg'] = 'Can not load PHP Extension (mbstring)';
        $solution_lists['php_extension_mbstring']['solution'] = 'Please enable mbstring extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (!extension_loaded('imagick') && !extension_loaded('gd')) {
        $solution_lists['php_extension_image_lib'] = [];
        $solution_lists['php_extension_image_lib']['msg'] = 'Can not load PHP Extension (imagick or gd)';
        $solution_lists['php_extension_image_lib']['solution'] = 'Please enable imagick or gd extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (!extension_loaded('zip')) {
        $solution_lists['php_extension_zip'] = [];
        $solution_lists['php_extension_zip']['msg'] = 'Can not load PHP Extension (zip)';
        $solution_lists['php_extension_zip']['solution'] = 'Please enable zip extensions <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638994-Installation-issue-on-EasyApache" target="_blank" class="btn">HELP</a>';
    }

    if (preg_match('/([0-9]+)/', ini_get('memory_limit'), $match)) {
        if ($match[0] < 64) {
            $solution_lists['php_memory_limit'] = [];
            $solution_lists['php_memory_limit']['msg'] = 'PHP Memory limit must be at least 64M.';
            $solution_lists['php_memory_limit']['solution'] = 'php.ini, Set Memory limit at least 64M.';
        }
    }

    //php function parse_ini_file
    if (!function_exists('parse_ini_file')) {
        $solution_lists['php_function_parse_ini_file'] = [];
        $solution_lists['php_function_parse_ini_file']['msg'] = 'Can not load PHP Function (parse_ini_file)';
        $solution_lists['php_function_parse_ini_file']['solution'] = 'Please allow PHP Function (parse_ini_file)  <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638954-Installation-issue-on-CloudLinux-System" target="_blank" class="btn">HELP</a>';
    }

    // php function file_put_contents
    if (!function_exists('file_put_contents')) {
        $solution_lists['php_function_file_put_contents'] = [];
        $solution_lists['php_function_file_put_contents']['msg'] = 'Can not load PHP Function (file_put_contents)';
        $solution_lists['php_function_file_put_contents']['solution'] = 'Please allow PHP Function (file_put_contents)  <br> <a href="https://support.rvglobalsoft.com/hc/en-us/articles/360034638954-Installation-issue-on-CloudLinux-System" target="_blank" class="btn">HELP</a>';
    }

    //TODO: add validate more ...

    return $solution_lists;
}
