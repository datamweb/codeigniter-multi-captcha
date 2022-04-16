<?php
namespace Datamweb\CIMC\Config;

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
    * @since           Version 1.0.2-pre-alpha
    * @datepublic      2022-02-26 | 1400/12/07
    * 
    */
class MultiCaptchaCIConfig extends BaseConfig
{

//Config  ArCaptcha''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://arcaptcha.ir/dashboard and register then get the SiteKey and SecretKey from the ArCaptcha panel.
    //
    public $arCaptcha = [
        'site_key'              =>  "Set_ARCaptcha_Site_Key",                       //Required. The sitekey you expect to see.
        'secret_key'            =>  "Set_ARCaptcha_Secret_Key",                     //Required. Your account secret key.
        //Enable more customization ArCaptcha .
        'color'                 =>  '#119744',                                      //Optional. Set color of every colored element in widget.color name or hex code;
        'lang'                  =>  '',                                             //Optional(en | fa) : Set language of widget . Defaults CI lang .
        'size'                  =>  'normal',                                       //Optional. Set the size of the widget. Defaults to normal.(normal | inivisible)
        'theme'                 =>  'light',                                        //Optional. Set the theme of widget. Defualts to light.(light | dark)
        'callback'              =>  '',                                             //Optional. Called when the user submits a successful response. The arcaptcha-token token is passed to your callback.(<function name>)        
        //No need to change.
        'BaseURI'               =>  'https://api.arcaptcha.ir/arcaptcha/',          //Required.Api Base Uri
        'ScriptURL'             =>  'https://widget.arcaptcha.ir/1/api.js',         //Required for run api
    ];

//Config biBot''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://bibot.ir/panel/user/signup/ and register then get the SiteKey and SecretKey from the bibot panel.
    public $biBot = [
        'site_key'              =>  "Set_biBot_Site_Key",                           //Required. The sitekey you expect to see.
        'secret_key'            =>  "Set_biBot_Secret_Key",                         //Required. Your account secret key.
        //bibot-captcha tag attributes
        'lang'                  =>  '',                                             //Optional :: fa | en (Defaults CI lang)
        'callback'              =>  '', 
        //No need to change.
        'BaseURI'               =>  'https://api.bibot.ir/',                        //Required.Api Base Uri
        'ScriptURL'             =>  'https://cdn.bibot.ir/bibot.min.js',            //Required for run api
    ];

//Config Googel reCaptcha''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://www.google.com/recaptcha/admin/create and register then get the SiteKey and SecretKey from the Googel panel.
    public $reCaptcha = [
        'site_key'              =>   "Set_reCaptcha_Site_Key",                      //Required. The sitekey you expect to see.
        'secret_key'            =>   "Set_reCaptcha_Secret_Key",                    //Required. Your account secret key.
        'lang'                  =>  '',                                             //Optional :: fa | en (Defaults CI lang)
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

//Config hCaptcha''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can get that at https://dashboard.hcaptcha.com/settings and register then get the SiteKey and SecretKey from the hcaptcha panel.
    public $hCaptcha = [
        'site_key'              =>   "Set_hCaptcha_Site_Key",                          //Required. The sitekey you expect to see.
        'secret_key'            =>   "Set_hCaptcha_Site_Key",                          //Required. Your account secret key.
        'lang'                  =>   '',                                               //Optional :: fa | en and https://docs.hcaptcha.com/languages (Defaults CI lang)
        // h-captcha tag attributes
        'theme'                 =>   'light',                                          //dark | light
        'size'                  =>   'normal',                                         //compact | normal
        'tabindex'              =>   '',                                               //Optional. Set the tabindex of the widget and popup. When appropriate, can make navigation more intuitive on your site. Defaults to 0.
        'callback'              =>   '',                                               //Optional. Called when the user submits a successful response. The h-captcha-response token is passed to your callback. 
        'expired_callback'      =>   '',                                               //Optional. Called when the passcode response expires and the user must re-verify.
        'chalexpired_callback'  =>   '',                                               //Optional. Called when the user display of a challenge times out with no answer.                        
        'open_callback'         =>   '',                                               //Optional. Called when the user display of a challenge starts.
        'close_callback'        =>   '',                                               //Optional. Called when the user dismisses a challenge.
        'error_callback'        =>   '',                                               //Optional. Called when hCaptcha encounters an error and cannot continue. If you specify an error callback, you must inform the user that they should retry. Please see https://docs.hcaptcha.com/configuration#error-codes. 
        //No need to change
        'BaseURI'               =>   'https://hcaptcha.com/',                          //Required.Api Base Uri
        'ScriptURL'             =>   'https://js.hcaptcha.com/1/api.js',               //Required for run api
    ];

//Config Rate Limit''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    //You can Limit an activity to be performed to a certain number of attempts within a set period of time 
    //And if Rate Limit enabled, allow the user to remove this restriction by solving the captcha.
    public $rateLimit = [
        'rate_limit_on'                         =>   true,                              //(true | false)
        'number_of_action'                      =>   25,                                //number of tokens the bucket holds
        'refill_period'                         =>   HOUR,                              //amount of time it takes the bucket to refill (SECOND |MINUTE|HOUR|DAY|WEEK|MONTH|YEAR|DECADE) (note::IT IS int )
        'captcha_name'                          =>   'recaptcha',                       //The name of the captcha used on the Rate Limit page. (arcaptcha|recaptcha|hcaptcha|bibot)
        'rate_limit_view'                       =>   'Datamweb\CIMC\Views\rate_limit',  //The view of used on the Rate Limit page.

    ];

}
