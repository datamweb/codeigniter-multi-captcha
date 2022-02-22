<?php
namespace CIMC\Config;

use CodeIgniter\Config\BaseConfig;
    /**
     * --------------------------------------------------------------------------
     * CodeIgniter Multi Captcha Configuration.
    * --------------------------------------------------------------------------
    *
    * @package         CodeIgniter-Multi-Captcha(CIMC)
    * @collection      Best Datamweb Tools CI4(BDT-CI4)
    * @author          Pooya Parsa Dadashi(@datamweb)
    * @link            https://datamweb.ir
    * @github_link     https://github.com/datamweb/CodeIgniter-Multi-Captcha
    * @since           Version 1.0.0-pre-alpha
    * @datepublic      2022-02-22 | 1400/12/03
    * 
    */

class MultiCaptchaCIConfig extends BaseConfig
{

//Config  ArCaptcha''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://arcaptcha.ir/dashboard and register then get the SiteKey and SecretKey from the ArCaptcha panel.
    //
    public $arCaptcha=[
        'site_key'              =>  "Set_ARCaptcha_Site_Key",                       //Required. The sitekey you expect to see.
        'secret_key'            =>  "Set_ARCaptcha_Secret_Key",                     //Required. Your account secret key.
        //Enable more customization ArCaptcha .
        'color'                 =>  '#119744',                                      //Optional. Set color of every colored element in widget.color name or hex code;
        //'lang'                =>  'fa',                                           //Optional. Set language of widget . Defaults to fa.(en | fa)
        'size'                  =>  'normal',                                       //Optional. Set the size of the widget. Defaults to normal.(normal | inivisible)
        'theme'                 =>  'light',                                        //Optional. Set the theme of widget. Defualts to light.(light | dark)
        'callback'              =>  '',                                             //Optional. Called when the user submits a successful response. The arcaptcha-token token is passed to your callback.(<function name>)        
        //No need to change.
        'BaseURI'               =>  'https://api.arcaptcha.ir/arcaptcha/',          //Required.Api Base Uri
        'ScriptURL'             =>  'https://widget.arcaptcha.ir/1/api.js',         //Required for run api
    ];

//Config biBot''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://bibot.ir/panel/user/signup/ and register then get the SiteKey and SecretKey from the bibot panel.
    public $biBot=[
        'site_key'              =>  "Set_biBot_Site_Key",                           //Required. The sitekey you expect to see.
        'secret_key'            =>  "Set_biBot_Secret_Key",                         //Required. Your account secret key.
        //bibot-captcha tag attributes
        //'lang'                =>  'fa',                                           //fa | en
        'callback'              =>  '', 
        //No need to change.
        'BaseURI'               =>  'https://api.bibot.ir/',                        //Required.Api Base Uri
        'ScriptURL'             =>  'https://cdn.bibot.ir/bibot.min.js',            //Required for run api
    ];

//Config Googel reCaptcha''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://www.google.com/recaptcha/admin/create and register then get the SiteKey and SecretKey from the Googel panel.
    public $reCaptcha=[
        'site_key'              =>   "Set_reCaptcha_Site_Key",                      //Required. The sitekey you expect to see.
        'secret_key'            =>   "Set_reCaptcha_Secret_Key",                    //Required. Your account secret key.
        // g-recaptcha tag attributes
        'theme'                 =>   'light',                                       //dark | light
        'size'                  =>   'normal',                                      //compact | normal
        'tabindex'              =>   '', 
        'callback'              =>   '', 
        'expired_callback'      =>   '', 
        'error_callback'=>'', 
        //No need to change.
        'BaseURI'               =>   'https://www.google.com/recaptcha/',           //Required.Api Base Uri
        'ScriptURL'             =>   'https://www.google.com/recaptcha/api.js',     //Required for run api
    ];

}
