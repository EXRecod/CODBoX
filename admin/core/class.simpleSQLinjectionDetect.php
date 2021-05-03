<?php
$for_attack_status = 0;
$attack_status = 0;
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $post_KEY = htmlspecialchars($key);
		
		if (strpos($value, "/etc/passwd") !== false) {
			$attack_status = 1;
		}
		if (strpos($value, "cmdshell") !== false) {
			$attack_status = 1;
		}		 
		if (strpos($value, "information_schema") !== false) {
			$attack_status = 1;
		}		
		if (strpos($value, "<script>") !== false) {
			$attack_status = 1;
		}
		if (strpos($value, "alert(\"xss\")") !== false) {
			$attack_status = 1;
		}
		 
        if (trim($post_KEY) === "port") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5}+/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 5) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "server") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5}+/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                } else {
                    $for_attack_status = 1;
                    foreach ($multi_servers_array as $arx => $f) {

                        if (trim($value) === trim($f)) {
                            $attack_status = 0;
                            $for_attack_status = 0;
                        }
                    }

                    if ($for_attack_status) {
                        die("Your attack is => " . $value . " GOODBYE!");
                    }

                }
            }
        }

        if (trim($post_KEY) === "s") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5}+/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                } else {
                    $for_attack_status = 1;
                    foreach ($multi_servers_array as $arx => $f) {

                        if (trim($value) === trim($f)) {
                            $attack_status = 0;
                            $for_attack_status = 0;
                        }
                    }
                    if ($for_attack_status) {
                        die("Your attack is => " . $value . " GOODBYE!");
                    }
                }
            }
        }

        if (trim($post_KEY) === "id") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (!is_numeric($value)) {
                    $attack_status = 1;
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }
        if (trim($post_KEY) === "player") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }
        if (trim($post_KEY) === "search") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }
        if (trim($post_KEY) === "guid") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "timeq") {
            if($value != "0") {
                if (strlen($value) > 14) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "timeh") {
            if($value != "0") {
                if (strlen($value) > 14) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "page") {
            if($value != "0") {
                if (preg_match('/^[0-9]{1,5}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (!is_numeric($value)) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "geo") {
            if($value != "0") {
                if (strlen($value) > 4) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "ip") {
            if($value != "0") {
                if (strlen($value) > 19) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "nicknameSearch") {
            if($value != "0") {
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($post_KEY) === "nicknameSearchguid") {
            if($value != "0") {
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }

        if ($attack_status) {
            die("Your attack is => " . $value . " GOODBYE!");
        }

    }
}


$for_attack_status = 0;
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $get_KEY = htmlspecialchars($key);

		if (strpos($value, "/etc/passwd") !== false) {
			$attack_status = 1;
		}
		if (strpos($value, "cmdshell") !== false) {
			$attack_status = 1;
		}		 
		if (strpos($value, "information_schema") !== false) {
			$attack_status = 1;
		}		
		if (strpos($value, "<script>") !== false) {
			$attack_status = 1;
		}
		if (strpos($value, "alert(\"xss\")") !== false) {
			$attack_status = 1;
		}
		 

        if (trim($get_KEY) === "port") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5}+/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 5) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "server") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5}+/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                } else {
                    $for_attack_status = 1;
                    foreach ($multi_servers_array as $arx => $f) {

                        if (trim($value) === trim($f)) {
                            $attack_status = 0;
                            $for_attack_status = 0;
                        }
                    }

                    if ($for_attack_status) {
                        die("Your attack is => " . $value . " GOODBYE!");
                    }

                }
            }
        }

        if (trim($get_KEY) === "s") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5}+/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                } else {
                    $for_attack_status = 1;
                    foreach ($multi_servers_array as $arx => $f) {

                        if (trim($value) === trim($f)) {
                            $attack_status = 0;
                            $for_attack_status = 0;
                        }
                    }
                    if ($for_attack_status) {
                        die("Your attack is => " . $value . " GOODBYE!");
                    }

                }
            }
        }

        if (trim($get_KEY) === "id") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (!is_numeric($value)) {
                    $attack_status = 1;
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }
        if (trim($get_KEY) === "search") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }
        if (trim($get_KEY) === "player") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }
        if (trim($get_KEY) === "guid") {
            if($value != "0") {
                if (preg_match('/^[0-9]{5,30}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "page") {
            if($value != "0") {
                if (preg_match('/^[0-9]{1,5}/', $value, $r)) {
                    if (trim($value) !== trim($r[0])) {
                        $attack_status = 1;
                    }
                }
                if (!is_numeric($value)) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "timeq") {
            if($value != "0") {
                if (strlen($value) > 14) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "timeh") {
            if($value != "0") {
                if (strlen($value) > 14) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "ip") {
            if($value != "0") {
                if (strlen($value) > 19) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "geo") {
            if($value != "0") {
                if (strlen($value) > 4) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "nicknameSearch") {
            if($value != "0") {
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }

        if (trim($get_KEY) === "nicknameSearchguid") {
            if($value != "0") {
                if (strlen($value) > 32) {
                    $attack_status = 1;
                }
            }
        }

        if ($attack_status) {
            die("Your attack is => " . $value . " GOODBYE!");
        }

    }
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

