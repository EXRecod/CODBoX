<?php

function security($string, $t = false)
{
    $string = str_replace("\'", "", $string);
    if ($t !== "m") {
        $string = htmlspecialchars($string, ENT_QUOTES);
    }
    $string = str_replace("--", "", $string);
    if ($t !== "u") {
        $urlEnable = array("/", "=");
        $string = str_replace($urlEnable, "", $string);
    }

    $injects = injectionsArray();

    $string = str_replace($injects, "", $string);

    return $string;
}


function injectionsArray()
{
	$injects = array("collate", "group by", ".shell", "xp_regread", "xp_cmdshell", 
			" delay", " +", "+ ", " declare", "drop ", " --", " --",
			" union ", " union all ", "%", " like", " where ", "insert ", 
			"select ", "update ", " update", " and 1 ", " 1=1 ", " 1=2 ", " 2=2 ", " or ");
	return $injects;
}
 
function requestReport($getArray)
{
    $dataArray = [];

    foreach ($getArray as $get => $getValue) {

        if (!empty($_GET[$get])) {
            $thisRequest = $_GET[$get];
        } elseif (!empty($_POST[$get])) {
            $thisRequest = $_POST[$get];
        }

        if (!empty($thisRequest)) {
            $dataArray[$get] = security($thisRequest);

            $injects = injectionsArray();

            foreach ($injects as $injection) {
                if (strpos(trim(strtolower($thisRequest)), $injection) !== false) {
                    $dataArray['INJECTION'] = "📛 Security alert! Injection detected! ".$thisRequest."
					Project Administration was reported! Attack ip saved!";
	 
        $data = date('d-m-Y H:i:s') . ' - ';
        $data .= $_SERVER['REMOTE_ADDR'] . ' - ';
        $data .= 'Suspect: [' . $dataArray['INJECTION'] . '] ';
        $data .= json_encode($_SERVER);
        @file_put_contents('sql.injection.txt', $data . PHP_EOL, FILE_APPEND);
    			
					die($dataArray['INJECTION']);
                }
            }
        }
    }

    return $dataArray;
}

 
if(!empty($_GET))
{
requestReport($_GET);
}
if(!empty($_POST))
{
requestReport($_POST);
}
 


/**
 * simpleSQLinjectionDetect Class
 * @link      https://github.com/bs4creations/simpleSQLinjectionDetect
 * @version   1.1
 */
class simpleSQLinjectionDetect
{
    protected $_method = array();
    protected $_suspect = null;

    public $_options = array(
        'log' => true,
        'unset' => true,
        'exit' => true,
        'errMsg' => 'Not allowed',
    );

    public function detect()
    {
        self::setMethod();

        if (!empty($this->_method)) {
            $result = self::parseQuery();

            if ($result) {
                if ($this->_options['log']) {
                    self::logQuery();
                }

                if ($this->_options['unset']) {
                    unset($_GET, $_POST);
                }

                if ($this->_options['exit']) {
                    exit($this->_options['errMsg']);
                }
            }
        }
    }

    private function setMethod()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->_method = $_GET;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->_method = $_POST;
        }
    }

    private function parseQuery()
    {
        $operators = array(
            'select * ',
            'select ',
            'update ', //new
            ' update ', //new
            'union all ',
            'union ',
            ' all ',
            ' where ',
            ' like ', //new
            ' and 1 ',
            ' and ',
            ' or ',
            ' 1=1 ',
            ' 2=2 ',
            ' -- ',
        );

        foreach ($this->_method as $key => $val) {
            $k = urldecode(strtolower($key));
            $v = urldecode(strtolower($val));

            foreach ($operators as $operator) {
                if (preg_match("/" . $operator . "/i", $k)) {
                    $this->_suspect = "operator: '" . $operator . "', key: '" . $k . "'";
                    return true;
                }
                if (preg_match("/" . $operator . "/i", $v)) {
                    $this->_suspect = "operator: '" . $operator . "', val: '" . $v . "'";
                    return true;
                }
            }
        }
    }

    private function logQuery()
    {
        $data = date('d-m-Y H:i:s') . ' - ';
        $data .= $_SERVER['REMOTE_ADDR'] . ' - ';
        $data .= 'Suspect: [' . $this->_suspect . '] ';
        $data .= json_encode($_SERVER);
        @file_put_contents('sql.injection.txt', $data . PHP_EOL, FILE_APPEND);
    }
}

$inj = new simpleSQLinjectionDetect();
$inj->detect();

