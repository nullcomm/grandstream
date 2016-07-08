<?php

/**
 * Grandstream GXP Phone File
 *
 * @author Cody Null
 * @license MPL / GPLv2 / LGPL
 * @package Provisioner
 * 
 */
class endpoint_grandstream_dp71x_phone extends endpoint_grandstream_base {

    public $family_line = 'dp71x';
    
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
            $result = '';
            $mac = $this->settings['mac'];
            while (strlen($mac) > 0) {
                $sub = substr($mac, 0, 2);
                $result .= $sub . ':';
                $mac = substr($mac, 2, strlen($mac));
            }
            // remove trailing colon
            $result = strtolower(substr($result, 0, strlen($result) - 1));
            $ip = trim((shell_exec("/usr/sbin/arp -n | grep " . $result . " | awk '{print $1}'")));
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
