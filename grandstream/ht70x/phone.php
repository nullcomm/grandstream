<?php

/**
 * Grandstream GXP Phone File
 *
 * @author Cody Null
 * @license MPL / GPLv2 / LGPL
 * @package Provisioner
 * 
 */
class endpoint_grandstream_ht70x_phone extends endpoint_grandstream_base {

    public $family_line = 'ht70x';
    
    function parse_lines_hook($line_data, $line_total) {
        $line_data['line_active'] = isset($line_data['secret']) ? '1' : '0';
        return($line_data);
    }

    function get_gmtoffset($timezone) {
        $timezone = str_replace(":", ".", $timezone);
        $timezone = str_replace("30", "5", $timezone);
        if (strrchr($timezone, '+')) {
            $num = explode("+", $timezone);
            $num = $num[1];
            $offset = 720 + ($num * 60);
        } elseif (strrchr($timezone, '-')) {
            $num = explode("-", $timezone);
            $num = $num[1];
            $offset = 720 + ($num * -60);
        }
        return($offset);
    }

    function prepare_for_generateconfig() {
        parent::prepare_for_generateconfig();

        if (isset($this->settings['dialplan'])) {
            $this->settings['dialplan'] = str_replace("+", "%2B", $this->settings['dialplan']);
        }

    }

    function reboot() {
        if (($this->engine == "asterisk") AND ($this->system == "unix")) {
            exec($this->engine_location . " -rx 'sip show peers like " . $this->settings['line'][0]['username'] . "'", $output);
            if (preg_match("/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/", $output[1], $matches)) {
                $ip = $matches[0];
                $pass = (isset($this->options['admin_pass']) ? $this->options['admin_pass'] : 'admin');

                if (function_exists('curl_init')) {
                    $ckfile = tempnam($this->sys_get_temp_dir(), "GSCURLCOOKIE");
                    $ch = curl_init('http://' . $ip . '/cgi-bin/dologin');
                    curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);

                    $data = array(
                        'P2' => $pass,
                        'Login' => 'Login',
                        'gnkey' => '0b82'
                    );

                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    $output = curl_exec($ch);
                    $info = curl_getinfo($ch);
                    curl_close($ch);

                    $ch = curl_init("http://" . $ip . "/cgi-bin/rs");
                    curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $output = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
    }
}
