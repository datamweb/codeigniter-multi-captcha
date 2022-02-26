<?php
namespace CIMC\Libraries {
    use Config\Services;

    /**
     * --------------------------------------------------------------------------
     * CodeIgniter Multi Captcha(CIMC) Libraries
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

    class MultiCaptchaCI
    {

        // this is name for select by user input string in getCaptchaFieldName method (getCaptchaFieldName('arcaptcha,recaptcha,bibot'))
        // this use in two method setScript and makeMultiCaptcha
        protected $_getRandomCaptchaName;

        /**
         * Constructor.
         *
         * 
         */
        public function __construct()
        {
            //load MultiCaptchaCIConfig config file
            $MultiCaptchaCIConfig =config('MultiCaptchaCIConfig');
            $this->CILanguage = Services::request()->getLocale();

            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            // ArCaptcha params 
            //..............................................................................................................            
            //api Key ArCaptcha 
            $this->_arCaptcha_site_key              =    $MultiCaptchaCIConfig->arCaptcha['site_key'];
            $this->_arCaptcha_secret_key            =    $MultiCaptchaCIConfig->arCaptcha['secret_key'];
            //load options from  makeMultiCaptcha($options[]) - for Enable more customization ArCaptcha.
            $this->_arCaptcha_color                 =    $options['color']     ??    $MultiCaptchaCIConfig->arCaptcha['color']    ??     'normal';
            $this->_arCaptcha_lang                  =    $options['lang']      ??    $MultiCaptchaCIConfig->arCaptcha['lang']     ??     $this->CILanguage;
            $this->_arCaptcha_size                  =    $options['size']      ??    $MultiCaptchaCIConfig->arCaptcha['size']     ??     'normal';
            $this->_arCaptcha_theme                 =    $options['theme']     ??    $MultiCaptchaCIConfig->arCaptcha['theme']    ??     'light';
            $this->_arCaptcha_callback              =    $options['callback']  ??    $MultiCaptchaCIConfig->arCaptcha['callback'] ??     '';
            //api URLs ArCaptcha 
            $this->_arCaptchaBaseURI                =    $MultiCaptchaCIConfig->arCaptcha['BaseURI'];
            $this->_arCaptchaScriptURL              =    $MultiCaptchaCIConfig->arCaptcha['ScriptURL'];

            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            // BiBot params
            //..............................................................................................................
            // load data from BiBot config file
            $this->_biBot_site_key                  =   $MultiCaptchaCIConfig->biBot['site_key'];
            $this->_biBot_secret_key                =   $MultiCaptchaCIConfig->biBot['secret_key'];
            //load options from  makeMultiCaptcha($options[]) - for Enable more customization biBot.
            $this->_biBot_lang                      =   $options['lang']      ??    $MultiCaptchaCIConfig->biBot['lang'] ?? $this->CILanguage;
            $this->_biBot_callback                  =   $options['callback']  ??    $MultiCaptchaCIConfig->biBot['callback'];
            //api URLs BiBot 
            $this->_biBotBaseURI                    =   $MultiCaptchaCIConfig->biBot['BaseURI'];
            $this->_biBotScriptURL                  =   $MultiCaptchaCIConfig->biBot['ScriptURL'];

            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            // google reCaptcha params
            //..............................................................................................................
            //api Key reCaptcha 
            $this->_reCaptcha_site_key              =   $MultiCaptchaCIConfig->reCaptcha['site_key'];
            $this->_reCaptcha_secret_key            =   $MultiCaptchaCIConfig->reCaptcha['secret_key'];
            //load options from  makeMultiCaptcha($options[]) - for Enable more customization reCaptcha.
            $this->_reCaptcha_lang                  =    $MultiCaptchaCIConfig->reCaptcha['lang'] ?? $this->CILanguage;
            $this->_reCaptcha_theme                 =   $options['theme']               ??  $MultiCaptchaCIConfig->reCaptcha['theme'];
            $this->_reCaptcha_size                  =   $options['size']                ??  $MultiCaptchaCIConfig->reCaptcha['size'];
            $this->_reCaptcha_tabindex              =   $options['tabindex']            ??  $MultiCaptchaCIConfig->reCaptcha['tabindex'];
            $this->_reCaptcha_callback              =   $options['callback']            ??  $MultiCaptchaCIConfig->reCaptcha['callback'];
            $this->_reCaptcha_expired_callback      =   $options['expired_callback']    ??  $MultiCaptchaCIConfig->reCaptcha['expired_callback'];
            $this->_reCaptcha_error_callback        =   $options['error_callback']      ??  $MultiCaptchaCIConfig->reCaptcha['error_callback'];
            //api URLs reCaptcha
            $this->_reCaptchaBaseURI                =   $MultiCaptchaCIConfig->reCaptcha['BaseURI'];
            $this->_reCaptchaScriptURL              =   $MultiCaptchaCIConfig->reCaptcha['ScriptURL'];

            //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            // hCaptcha params
            //..............................................................................................................
            //api Key hCaptcha 
            $this->_hCaptcha_site_key               =   $MultiCaptchaCIConfig->hCaptcha['site_key'];
            $this->_hCaptcha_secret_key             =   $MultiCaptchaCIConfig->hCaptcha['secret_key'];
            //load options from  makeMultiCaptcha($options[]) - for Enable more customization hCaptcha.
            $this->_hCaptcha_lang                   =  $MultiCaptchaCIConfig->hCaptcha['lang']  ?? $this->CILanguage;
            $this->_hCaptcha_theme                  =  $options['theme']                        ??  $MultiCaptchaCIConfig->hCaptcha['theme'];
            $this->_hCaptcha_size                   =  $options['size']                         ??  $MultiCaptchaCIConfig->hCaptcha['size'];
            $this->_hCaptcha_tabindex               =  $options['tabindex']                     ??  $MultiCaptchaCIConfig->hCaptcha['tabindex'];
            $this->_hCaptcha_callback               =  $options['callback']                     ??  $MultiCaptchaCIConfig->hCaptcha['callback'];
            $this->_hCaptcha_expired_callback       =  $options['expired_callback']             ??  $MultiCaptchaCIConfig->hCaptcha['expired_callback'];
            $this->_hCaptcha_chalexpired_callback   =  $options['chalexpired_callback']         ??  $MultiCaptchaCIConfig->hCaptcha['chalexpired_callback'];
            $this->_hCaptcha_open_callback          =  $options['open_callback']                ??  $MultiCaptchaCIConfig->hCaptcha['open_callback'];
            $this->_hCaptcha_close_callback         =  $options['close_callback']               ??  $MultiCaptchaCIConfig->hCaptcha['close_callback'];
            $this->_hCaptcha_error_callback         =  $options['error_callback']               ??  $MultiCaptchaCIConfig->hCaptcha['error_callback'];
            //api URLs hCaptcha
            $this->_hCaptchaBaseURI                 =  $MultiCaptchaCIConfig->hCaptcha['BaseURI'];
            $this->_hCaptchaScriptURL               =  $MultiCaptchaCIConfig->hCaptcha['ScriptURL'];
        }

        /**
         * load js file for each of the captcha services. 
         * It is necessary to use this Method.
         * @return string
         * @params string :: arcaptcha | bibot | recaptcha,fa
         */
        public function makeJSLink(string $CaptchaName ='arcaptcha'): string
        {
             $MultiCaptchaCIConfig =config('MultiCaptchaCIConfig');
            //set just recaptcha lang in end js file linke (?hl=fa)
            // recaptcha,fa | recaptcha,en | recaptcha,ar ...
            $part = explode(",", $CaptchaName);
                $CaptchaName    = $part[0];  // part1
                $googleLang     = $part[1] ?? $this->_reCaptcha_lang;   // part2
                $hCaptchaLang   = $part[1] ?? $this->_hCaptcha_lang;   // part2
                if($CaptchaName == 'randomcaptcha'){
                    $CaptchaName =$this->_getRandomCaptchaName;
                }
            switch ($CaptchaName) {
                //make bibot js link
                case "bibot":
                    return sprintf('<script src="%s"></script>', $this->_biBotScriptURL);
                //make recaptcha js link
                case "recaptcha":
                    // just for set lang in recaptcha you are ->>>> $this->_reCaptchaScriptURL?hl=fa
                    return sprintf('<script src="%s?hl=%s"></script>', 
                    $this->_reCaptchaScriptURL,
                    $googleLang,
                );
                //make hcaptcha js link
                case "hcaptcha":
                    // just for set lang in hcaptcha you are ->>>> $this->_hCaptchaScriptURL?hl=fa
                    return sprintf('<script src="%s?hl=%s" async defer></script>', 
                    $this->_hCaptchaScriptURL,
                    $hCaptchaLang,
                    );
                default:
                    return sprintf('<script src="%s" async defer></script>', $this->_arCaptchaScriptURL);
            }
        }
        /**
         * Make Widget(HTML tag) for every captcha
         * @return string
         */
        public function makeCaptchaHtmlTag(array $options = ['captcha_name'=>'arcaptcha']): string
        {
            $CaptchaName =$options['captcha_name'];
            if($options['captcha_name'] == 'randomcaptcha'){
                    $CaptchaName =$this->_getRandomCaptchaName;
                }

            switch ($CaptchaName) {
                //make bibot html tag
                case "bibot":
                    return sprintf(
                        '<div class="bibot-captcha" data-sitekey="%s" data-lang="%s" data-callback="%s"></div>',
                        $this->_biBot_site_key,
                        $options['lang']        ?? $this->_biBot_lang,
                        $options['callback']    ?? $this->_biBot_callback  ?? '',
                    ); 
                //make recaptcha html tag
                case "recaptcha":
                    // just for set lang in recaptcha you are ->>>> $this->_reCaptchaScriptURL?hl=fa
                    return sprintf(
                        '<div class="g-recaptcha" data-sitekey="%s" data-theme="%s" data-size="%s" data-tabindex="%s" data-callback="%s" data-expired-callback="%s" data-error-callback="%s"></div>',
                        $this->_reCaptcha_site_key,
                        $options['theme']               ?? $this->_reCaptcha_theme              ?? '',
                        $options['size']                ?? $this->_reCaptcha_size               ?? '',
                        $options['tabindex']            ?? $this->_reCaptcha_tabindex           ?? '',
                        $options['callback']            ?? $this->_reCaptcha_callback           ?? '',
                        $options['expired_callback']    ?? $this->_reCaptcha_expired_callback   ?? '',
                        $options['error_callback']      ?? $this->_reCaptcha_error_callback     ?? '',
  
                    ); 
                //make hcaptcha html tag
                case "hcaptcha":
                    return sprintf(
                        '<div class="h-captcha" data-sitekey="%s" data-theme="%s" data-size="%s" data-tabindex="%s" data-callback="%s" data-expired-callback="%s" data-chalexpired-callback="%s" data-open-callback="%s" data-close-callback="%s" data-error-callback="%s"></div>',
                        $this->_hCaptcha_site_key,
                        $options['theme']                       ?? $this->_hCaptcha_theme                   ?? '',
                        $options['size']                        ?? $this->_hCaptcha_size                    ?? '',
                        $options['tabindex']                    ?? $this->_hCaptcha_tabindex                ?? '',
                        $options['callback']                    ?? $this->_hCaptcha_callback                ?? '',
                        $options['expired_callback']            ?? $this->_hCaptcha_expired_callback        ?? '',
                        $options['chalexpired_callback']        ?? $this->_hCaptcha_chalexpired_callback    ?? '',                        
                        $options['open_callback']               ?? $this->_hCaptcha_open_callback           ?? '',
                        $options['close_callback']              ?? $this->_hCaptcha_close_callback          ?? '',
                        $options['error_callback']              ?? $this->_hCaptcha_error_callback          ?? '',
  
                    ); 
                default:
                    return sprintf(
                        '<div class="arcaptcha" data-site-key="%s" data-color="%s" data-lang="%s" data-size="%s" data-theme="%s" data-callback="%s"></div>',
                        $this->_arCaptcha_site_key,
                        $options['color']       ??  $this->_arCaptcha_color      ?? 'normal',
                        $options['lang']        ??  $this->_arCaptcha_lang       ,//?? $this->CILanguage,
                        $options['size']        ??  $this->_arCaptcha_size       ?? 'normal',
                        $options['theme']       ??  $this->_arCaptcha_theme      ?? 'light',
                        $options['callback']    ??  $this->_arCaptcha_callback   ?? '',
                    );
            }
        }

        /**
         * Verify ArCaptcha the User Response
         *
         * 
         */
        public function verifyArCaptcha( $arcaptcha_token):string
        {
            //set params
            $form_params["site_key"]        =   $this->_arCaptcha_site_key;
            $form_params["secret_key"]      =   $this->_arCaptcha_secret_key;
            $form_params["challenge_id"]    =   $arcaptcha_token;
            // set options
            $form_params["baseURI"]         =   $this->_arCaptchaBaseURI;
            $response=static::RunApi('api/verify',$form_params);
            return $response;
        }

        /**
         * Verify BiBot the User Response
         *
         * 
         */
        public function verifyBiBot(string $bibot_response):string
        {
            //set params
            $form_params["response"]        =   $bibot_response;
            $form_params["secret"]          =   $this->_biBot_secret_key;
            // set options
            $form_params["baseURI"]         =   $this->_biBotBaseURI;
            //RUN Method Verify BiBot
            $response=static::RunApi('api1/siteverify/',$form_params);
            return $response;
           
        }

        /**
         * Verify ReCaptcha the User Response
         *
         * 
         */
        public function verifyReCaptcha(string $recaptcha_token):string
        {
            //set params
            $form_params["secret"]                  =   $this->_reCaptcha_secret_key;
            $form_params["response"]                =   $recaptcha_token;
            // set options
            $form_params["baseURI"]                 =   $this->_reCaptchaBaseURI;
            //RUN Method verify ReCaptcha
            $response=static::RunApi('api/siteverify',$form_params);
            return $response;
        }

        /**
         * Verify hCaptcha the User Response
         *
         * 
         */
        public function verifyHCaptcha(string $h_captcha_response):string
        {
            //set params
            $form_params["secret"]                  =   $this->_hCaptcha_secret_key;
            $form_params["response"]                =   $h_captcha_response;
            // set options
            $form_params["baseURI"]                 =   $this->_hCaptchaBaseURI;
            //RUN Method verify ReCaptcha
            $response=static::RunApi('siteverify',$form_params);
            return $response;
        }

        /**
         * getCaptchaFieldName return input field name for evvery captcha -- by select a captcha form input liste (arcaptcha,bibot,recaptcha)
         * @return string
         */
        public function getCaptchaFieldName(string $CaptchaListName='arcaptcha'):string
        {
            // global $this->_getRandomCaptchaName
            $CaptchaName=$this->getRandomCaptchaName($CaptchaListName);

            switch ($CaptchaName){
                //input field name for bibot
                case "bibot":
                    return "bibot-response";
                //input field name for recaptcha
                case "recaptcha":
                    return "g-recaptcha-response";
                //input field name for hcaptcha
                case "hcaptcha":
                    return "h-captcha-response";
                //input field name for arcaptcha
                default :
                    return "arcaptcha-token";
            }
        }

        /**
         * get Rule name -- by select a captcha form input liste (arcaptcha,bibot,recaptcha)
         * @return string
         */
        public function getRuleName():string
        {
            // set rule name
            return $this->_getRandomCaptchaName;

        }

        /**
         * This function select random One CaptchaName of input list    
         * This function set $this->_getRandomCaptchaName  
         * @ return Selected Random Captcha Name
         * 
         */        
        private function getRandomCaptchaName(string $CaptchaListName):string
        {
            // $CaptchaListName = "arcaptcha,bibot,recaptcha";
            // Here we split CaptchaName.
            $CaptchaName = explode( ",", $CaptchaListName );
            $key = array_rand($CaptchaName);
            // set var _getRandomCaptchaName whit random name 
            $this->_getRandomCaptchaName=$CaptchaName[$key];
            return $this->_getRandomCaptchaName;
        }

        /**
         * This function send request to API URLs
         * this function use in all verify method
         *
         * @param string     $endPoint Method name
         * @param array      $form_params is form params for post request in body and headers.
         *
         * @return MIX      
         */
        private function RunApi($endPoint,$form_params=[])
        {
            $options = [
                'baseURI' => $form_params['baseURI'],
                'timeout'  => 4,
            ];
            unset($form_params['baseURI']);
            $form_data_type=[
                'json' => $form_params,
                'http_errors' => false
            ];
           // confing data and form for biBot and recaptcha API. Note:::: default confing for arcaptcha API
            if($endPoint=='api1/siteverify/' || $endPoint=='api/siteverify' || $endPoint=='siteverify'){
                unset($form_data_type);
                unset($form_params['baseURI']);
                $form_data_type=[
                    'form_params' => $form_params,
                    'headers' =>[
                                'Content-type'=>'application/x-www-form-urlencoded'
                                ]
                ];
            }
            $client = \Config\Services::curlrequest($options);
           try {
                //send request to API URL 
                $response = $client->request('POST' , $endPoint, $form_data_type);
                return $response->getBody();
           } catch (\Exception $e) {
            //die($e->getMessage());
               return  false ;
           }
        }

    }
}