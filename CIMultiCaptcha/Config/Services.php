<?php

namespace CIMC\Config;

use CodeIgniter\Config\BaseService;

/**
 * --------------------------------------------------------------------------
 * CodeIgniter Multi Captcha (CIMC) Services Configuration file
 * --------------------------------------------------------------------------
 *
 * @package         CodeIgniter-Multi-Captcha(CIMC)
 * @collection      Best Datamweb Tools CI4(BDT-CI4)
 * @author          Pooya Parsa Dadashi(@datamweb)
 * @link            https://datamweb.ir
 * @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
 * @since           Version 1.0.0
 * @datepublic      2022-02-19 | 1400/11/30
 * 
 */

class Services extends BaseService
{
    //CI MULTI CAPTCHA 
     public static function MutiCaptchCI($getShared = true)
     {
        if ($getShared) {
            return static::getSharedInstance('MutiCaptchCI');
        }
        return new \CIMC\Libraries\MultiCaptchaCI();
     }
    
}
